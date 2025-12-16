/**
 * Product Review Form Handler
 * Handles review submission via AJAX
 */

document.addEventListener('DOMContentLoaded', function () {
    const reviewForm = document.getElementById('review-form');

    if (reviewForm) {
        reviewForm.addEventListener('submit', async function (e) {
            e.preventDefault();

            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;

            // Deshabilitar botón durante el envío
            submitBtn.disabled = true;
            submitBtn.textContent = 'Enviando...';

            try {
                const formData = new FormData(this);

                const response = await fetch('/reviews', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    // Mostrar mensaje de éxito
                    showNotification(data.message, 'success');

                    // Agregar la nueva reseña al DOM
                    appendReview(data.review);

                    // Limpiar formulario
                    this.reset();

                    // Ocultar formulario y mostrar mensaje de agradecimiento
                    setTimeout(() => {
                        location.reload(); // Recargar para mostrar estado actualizado
                    }, 1500);
                } else {
                    showNotification(data.message || 'Error al enviar la reseña', 'error');
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                }
            } catch (error) {
                console.error('Error submitting review:', error);
                showNotification('Error al enviar la reseña. Por favor intenta de nuevo.', 'error');
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }
        });
    }

    /**
     * Agregar nueva reseña al DOM
     */
    function appendReview(review) {
        const reviewList = document.getElementById('review-list');
        if (!reviewList) return;

        // Si la lista está vacía (mostraba el mensaje), limpiarla
        const emptyMessage = reviewList.closest('.review-people').querySelector('.text-center');
        if (emptyMessage) {
            emptyMessage.remove();
            reviewList.innerHTML = '';
        }

        const stars = Array.from({ length: 5 }, (_, i) =>
            `<i data-feather="star" class="${i < review.rating ? 'fill' : ''}"></i>`
        ).join('');

        const reviewHTML = `
            <div class="review-item mb-4 pb-4 border-bottom">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="mb-1">${review.user_name}</h5>
                        <div class="rating mb-2">
                            ${stars}
                        </div>
                    </div>
                </div>
                <p class="text-muted mb-0">${review.comment}</p>
            </div>
        `;

        reviewList.insertAdjacentHTML('afterbegin', reviewHTML);

        // Inicializar iconos de Feather
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    }

    /**
     * Mostrar notificación
     */
    function showNotification(message, type = 'info') {
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
                timer: 3000,
            });
        } else {
            alert(message);
        }
    }
});
