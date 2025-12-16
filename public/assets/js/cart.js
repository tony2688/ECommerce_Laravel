/**
 * Cart Management System
 * Handles cart operations using sessionStorage for guests and database for authenticated users
 */

const CartManager = {
    MAX_ITEMS: 50,
    STORAGE_KEY: 'ecommerce_cart',
    _initialized: false,

    /**
     * Initialize cart system
     */
    init() {
        // Prevenir inicialización duplicada
        if (this._initialized) {
            console.log('CartManager already initialized, skipping...');
            return;
        }

        this._initialized = true;
        console.log('CartManager initializing...');

        this.updateCartBadge();
        this.attachEventListeners();
        this.syncOnLogin();
    },

    /**
     * Get cart from localStorage
     */
    getCart() {
        const cart = localStorage.getItem(this.STORAGE_KEY);
        return cart ? JSON.parse(cart) : [];
    },

    /**
     * Save cart to localStorage
     */
    saveCart(cart) {
        localStorage.setItem(this.STORAGE_KEY, JSON.stringify(cart));
        this.updateCartBadge();
    },

    /**
     * Add product to cart
     */
    async addToCart(productData) {
        try {
            console.log('Sending to cart:', productData);

            const response = await fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    product_id: productData.id,
                    quantity: productData.quantity
                })
            });

            const data = await response.json();

            if (!response.ok) {
                this.showNotification(data.message || 'Error al agregar producto', 'error');
                return false;
            }

            // Si es invitado, guardar en localStorage
            if (data.product) {
                console.log('Product received from server:', data.product);
                let cart = this.getCart();

                // Verificar límite
                if (cart.length >= this.MAX_ITEMS) {
                    this.showNotification(`Límite de ${this.MAX_ITEMS} productos alcanzado`, 'error');
                    return false;
                }

                const existingItem = cart.find(item => item.id === data.product.id);

                if (existingItem) {
                    existingItem.quantity += data.product.quantity;
                } else {
                    cart.push(data.product);
                }

                console.log('Updated cart:', cart);
                this.saveCart(cart);
            }

            this.showNotification(data.message, 'success');
            this.updateCartBadge();
            return true;

        } catch (error) {
            console.error('Error adding to cart:', error);
            this.showNotification('Error al agregar al carrito', 'error');
            return false;
        }
    },

    /**
     * Update cart item quantity
     */
    async updateQuantity(productId, quantity) {
        try {
            const response = await fetch(`/cart/update/${productId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ quantity })
            });

            const data = await response.json();

            if (!response.ok) {
                this.showNotification(data.message || 'Error al actualizar', 'error');
                return false;
            }

            // Si es invitado, actualizar localStorage
            if (!data.cart_count) {
                let cart = this.getCart();
                const item = cart.find(item => item.id === productId);
                if (item) {
                    item.quantity = quantity;
                    this.saveCart(cart);
                }
            }

            this.updateCartBadge();
            return true;

        } catch (error) {
            console.error('Error updating cart:', error);
            return false;
        }
    },

    /**
     * Remove product from cart
     */
    async removeFromCart(productId) {
        try {
            const response = await fetch(`/cart/remove/${productId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            const data = await response.json();

            // Si es invitado, remover de localStorage
            if (!data.cart_count) {
                let cart = this.getCart();
                cart = cart.filter(item => item.id !== productId);
                this.saveCart(cart);
            }

            this.showNotification(data.message, 'success');
            this.updateCartBadge();
            return true;

        } catch (error) {
            console.error('Error removing from cart:', error);
            return false;
        }
    },

    /**
     * Get cart count
     */
    getCartCount() {
        const cart = this.getCart();
        return cart.reduce((total, item) => total + item.quantity, 0);
    },

    /**
     * Update cart badge in header
     */
    async updateCartBadge() {
        const badge = document.querySelector('.cart-count-badge');
        if (!badge) return;

        // Para invitados, usar localStorage directamente
        const count = this.getCartCount();
        badge.textContent = count;
        badge.style.display = count > 0 ? 'inline-block' : 'none';

        // Opcional: sincronizar con servidor si está autenticado
        try {
            const response = await fetch('/cart/count');
            const data = await response.json();

            // Solo usar el count del servidor si es mayor que 0 (usuario autenticado)
            if (data.count > 0) {
                badge.textContent = data.count;
                badge.style.display = 'inline-block';
            }
        } catch (error) {
            // Silenciosamente fallar, ya usamos localStorage arriba
            console.log('Cart count fetch failed, using localStorage');
        }
    },

    /**
     * Sync cart from sessionStorage to database on login
     */
    async syncOnLogin() {
        // Verificar si el usuario acaba de hacer login
        const shouldSync = sessionStorage.getItem('sync_cart_on_login');

        if (shouldSync === 'true') {
            const cart = this.getCart();

            if (cart.length > 0) {
                try {
                    const response = await fetch('/cart/sync', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ cart })
                    });

                    const data = await response.json();

                    if (response.ok) {
                        // Limpiar localStorage después de sincronizar
                        localStorage.removeItem(this.STORAGE_KEY);
                        this.showNotification(data.message, 'success');
                    }
                } catch (error) {
                    console.error('Error syncing cart:', error);
                }
            }

            sessionStorage.removeItem('sync_cart_on_login');
        }
    },

    /**
     * Attach event listeners
     */
    attachEventListeners() {
        // Botones "Agregar al carrito"
        document.addEventListener('click', async (e) => {
            if (e.target.closest('.btn-cart')) {
                console.log('Cart click detected', e.target);
                e.preventDefault();
                const button = e.target.closest('.btn-cart');
                const productBox = button.closest('[data-product-id]');

                if (productBox) {
                    const productId = parseInt(productBox.dataset.productId);

                    // Buscar input de cantidad en el productBox
                    const quantityInput = productBox.querySelector('.qty-input');
                    let quantity = 1; // Default para listados de productos

                    // Si hay un input de cantidad (página de detalles), usar su valor
                    if (quantityInput) {
                        quantity = parseInt(quantityInput.value) || 1;
                    }

                    // Extraer datos adicionales del producto
                    const productData = {
                        id: productId,
                        name: productBox.dataset.name || '',
                        image: productBox.dataset.image || '',
                        slug: productBox.dataset.slug || '',
                        price: parseFloat(productBox.dataset.price) || 0,
                        quantity: quantity
                    };

                    console.log('Product data extracted:', productData);

                    if (quantity > 0) {
                        await this.addToCart(productData);
                    }
                }
            }

            // Botones de incremento/decremento
            if (e.target.closest('.qty-right-plus')) {
                const parent = e.target.closest('.counter') || e.target.closest('.input-group') || e.target.closest('.qty-box');
                if (parent) {
                    const input = parent.querySelector('.qty-input');
                    if (input) {
                        const currentValue = parseInt(input.value) || 0;
                        input.value = currentValue + 1;
                    }
                }
            }

            if (e.target.closest('.qty-left-minus')) {
                const parent = e.target.closest('.counter') || e.target.closest('.input-group') || e.target.closest('.qty-box');
                if (parent) {
                    const input = parent.querySelector('.qty-input');
                    if (input) {
                        const currentValue = parseInt(input.value) || 0;
                        if (currentValue > 0) {
                            input.value = currentValue - 1;
                        }
                    }
                }
            }
        });
    },

    /**
     * Show notification
     */
    showNotification(message, type = 'info') {
        if (typeof $.notify === 'function') {
            $.notify({
                message: message
            }, {
                type: type === 'error' ? 'danger' : type,
                offset: {
                    x: 20,
                    y: 80
                },
                spacing: 10,
                z_index: 1031,
                timer: 2000,
            });
        } else if (typeof toastr !== 'undefined') {
            toastr[type](message);
        } else {
            // Fallback for debugging
            console.log(`[${type}] ${message}`);
        }
    }
};

// Initialize on DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => CartManager.init());
} else {
    CartManager.init();
}

// Export for use in other scripts
window.CartManager = CartManager;
