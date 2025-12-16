/**
 * Wishlist Management System
 * Handles wishlist operations using localStorage for guests and database for authenticated users
 */

const WishlistManager = {
    STORAGE_KEY: 'ecommerce_wishlist',
    isAuthenticated: false,

    /**
     * Initialize wishlist system
     */
    init() {
        this.checkAuthStatus();
        this.loadWishlistState();
        this.attachEventListeners();
        this.syncOnLogin();
    },

    /**
     * Check if user is authenticated
     */
    checkAuthStatus() {
        // Verificar si existe un meta tag o variable global que indique autenticación
        const authMeta = document.querySelector('meta[name="user-authenticated"]');
        this.isAuthenticated = authMeta && authMeta.content === 'true';
    },

    /**
     * Get wishlist from localStorage (solo para invitados)
     */
    getWishlist() {
        const wishlist = localStorage.getItem(this.STORAGE_KEY);
        return wishlist ? JSON.parse(wishlist) : [];
    },

    /**
     * Save wishlist to localStorage
     */
    saveWishlist(wishlist) {
        localStorage.setItem(this.STORAGE_KEY, JSON.stringify(wishlist));
    },

    /**
     * Load wishlist state and update UI
     */
    async loadWishlistState() {
        if (this.isAuthenticated) {
            // Obtener wishlist del servidor
            try {
                const response = await fetch('/wishlist/ids');
                const data = await response.json();
                this.updateWishlistUI(data.wishlist);
            } catch (error) {
                console.error('Error loading wishlist:', error);
            }
        } else {
            // Usar localStorage
            const wishlist = this.getWishlist();
            this.updateWishlistUI(wishlist);
        }
    },

    /**
     * Toggle product in wishlist
     */
    async toggleWishlist(productId) {
        if (this.isAuthenticated) {
            // Usuario autenticado: usar API
            return await this.toggleWishlistAPI(productId);
        } else {
            // Invitado: usar localStorage
            return this.toggleWishlistLocal(productId);
        }
    },

    /**
     * Toggle wishlist via API (usuarios autenticados)
     */
    async toggleWishlistAPI(productId) {
        try {
            const response = await fetch(`/wishlist/toggle/${productId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            const data = await response.json();

            if (!response.ok) {
                if (data.guest) {
                    // Usuario no autenticado, redirigir al login
                    this.showNotification('Inicia sesión para guardar en tu lista de deseos', 'info');
                    // Guardar en localStorage temporalmente
                    this.toggleWishlistLocal(productId);
                    return false;
                }
                this.showNotification(data.message || 'Error', 'error');
                return false;
            }

            this.showNotification(data.message, 'success');
            this.updateProductWishlistUI(productId, data.action === 'added');
            return true;

        } catch (error) {
            console.error('Error toggling wishlist:', error);
            this.showNotification('Error al actualizar lista de deseos', 'error');
            return false;
        }
    },

    /**
     * Toggle wishlist in localStorage (invitados)
     */
    toggleWishlistLocal(productId) {
        let wishlist = this.getWishlist();
        const index = wishlist.indexOf(productId);

        if (index > -1) {
            // Remover
            wishlist.splice(index, 1);
            this.saveWishlist(wishlist);
            this.updateProductWishlistUI(productId, false);
            this.showNotification('Producto eliminado de tu lista temporal', 'success');
            return false;
        } else {
            // Agregar
            wishlist.push(productId);
            this.saveWishlist(wishlist);
            this.updateProductWishlistUI(productId, true);
            this.showNotification('Producto agregado a tu lista temporal. Inicia sesión para guardar permanentemente.', 'info');
            return true;
        }
    },

    /**
     * Update wishlist UI for all products
     */
    updateWishlistUI(wishlistIds) {
        document.querySelectorAll('[data-product-id]').forEach(productBox => {
            const productId = parseInt(productBox.dataset.productId);
            const isInWishlist = wishlistIds.includes(productId);
            this.updateProductWishlistUI(productId, isInWishlist);
        });
    },

    /**
     * Update wishlist UI for a single product
     */
    updateProductWishlistUI(productId, isInWishlist) {
        const productBox = document.querySelector(`[data-product-id="${productId}"]`);
        if (!productBox) return;

        const wishlistBtn = productBox.querySelector('.btn-wishlist');
        if (!wishlistBtn) return;

        // Para Feather Icons, solo cambiamos la clase 'fill' del icono
        const icon = wishlistBtn.querySelector('i[data-feather="heart"]');
        if (icon) {
            if (isInWishlist) {
                icon.classList.add('fill');
                wishlistBtn.classList.add('active');
            } else {
                icon.classList.remove('fill');
                wishlistBtn.classList.remove('active');
            }
            // Reinicializar Feather Icons para aplicar cambios
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        }
    },

    /**
     * Sync wishlist from localStorage to database on login
     */
    async syncOnLogin() {
        const shouldSync = sessionStorage.getItem('sync_wishlist_on_login');

        if (shouldSync === 'true' && this.isAuthenticated) {
            const wishlist = this.getWishlist();

            if (wishlist.length > 0) {
                try {
                    const response = await fetch('/wishlist/sync', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ wishlist })
                    });

                    const data = await response.json();

                    if (response.ok) {
                        // Limpiar localStorage después de sincronizar
                        localStorage.removeItem(this.STORAGE_KEY);
                        this.showNotification(data.message, 'success');
                        this.loadWishlistState();
                    }
                } catch (error) {
                    console.error('Error syncing wishlist:', error);
                }
            }

            sessionStorage.removeItem('sync_wishlist_on_login');
        }
    },

    /**
     * Attach event listeners
     */
    attachEventListeners() {
        document.addEventListener('click', async (e) => {
            if (e.target.closest('.btn-wishlist')) {
                e.preventDefault();
                const button = e.target.closest('.btn-wishlist');
                const productBox = button.closest('[data-product-id]');

                if (productBox) {
                    const productId = parseInt(productBox.dataset.productId);
                    await this.toggleWishlist(productId);
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
            console.log(`[${type}] ${message}`);
        }
    }
};

// Initialize on DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => WishlistManager.init());
} else {
    WishlistManager.init();
}

// Export for use in other scripts
window.WishlistManager = WishlistManager;
