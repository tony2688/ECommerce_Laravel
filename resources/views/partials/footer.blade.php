<footer class="section-t-space footer-section-2">
    <div class="container-fluid-lg">
        <div class="main-footer">
            <div class="row g-md-4 gy-sm-5 gy-2">

                {{-- Columna: Logo + descripción + redes --}}
                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <a href="{{ url('/') }}" class="foot-logo">
                        <img src="{{ asset('assets/images/logo/logoweb.png') }}" class="img-fluid"
                            alt="WebinizaDev Shop">
                    </a>
                    <p class="information-text">
                        WebinizaDev Shop es tu tienda online para comprar fácil, rápido y seguro,
                        con productos seleccionados y atención personalizada.
                    </p>
                    <ul class="social-icon">
                        <li>
                            <a href="https://www.facebook.com" target="_blank" rel="noopener">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com" target="_blank" rel="noopener">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com" target="_blank" rel="noopener">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com" target="_blank" rel="noopener">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Columna: Sobre la tienda --}}
                <div class="col-xxl-2 col-xl-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Sobre la tienda</h4>
                    </div>
                    <ul class="footer-list footer-contact mb-sm-0 mb-3">
                        <li>
                            <a href="{{ url('/sobre-nosotros') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Sobre nosotros
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/contacto') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Contacto
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/terminos') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Términos y condiciones
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/privacidad') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Política de privacidad
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/blog') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Blog y novedades
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Columna: Enlaces útiles --}}
                <div class="col-xxl-2 col-xl-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Enlaces útiles</h4>
                    </div>
                    <ul class="footer-list footer-contact mb-sm-0 mb-3">
                        <li>
                            <a href="{{ url('/pedidos') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Mis pedidos
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/mi-cuenta') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Mi cuenta
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/seguimiento') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Seguimiento de envío
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/wishlist') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Lista de deseos
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/faq') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Preguntas frecuentes
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Columna: Categorías destacadas (puede ser dinámica luego) --}}
                <div class="col-xxl-2 col-xl-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Categorías</h4>
                    </div>
                    <ul class="footer-list footer-contact mb-sm-0 mb-3">
                        <li>
                            <a href="{{ url('/tienda?categoria=frutas-verduras') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Frutas y verduras
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/tienda?categoria=bebidas') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Bebidas
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/tienda?categoria=almacen') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Almacén
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/tienda?categoria=limpieza') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Limpieza
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/tienda') }}" class="footer-contain-2">
                                <i class="fas fa-angle-right"></i>Ver todas
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Columna: Información de la tienda --}}
                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Información de la tienda</h4>
                    </div>
                    <ul class="footer-address footer-contact">
                        <li>
                            <div class="inform-box flex-start-box">
                                <i data-feather="map-pin"></i>
                                <p>
                                    WebinizaDev Shop
                                    San Miguel de Tucumán, Tucumán, Argentina
                                </p>
                            </div>
                        </li>

                        <li>
                            <div class="inform-box">
                                <i data-feather="phone"></i>
                                <p>Teléfono: +54 381 555 5648</p>
                            </div>
                        </li>

                        <li>
                            <div class="inform-box">
                                <i data-feather="mail"></i>
                                <p>Email: info@webinizadev.com</p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        {{-- Sub-footer --}}
        <div class="sub-footer section-small-space">
            <div class="left-footer">
                <p>
                    © {{ now()->year }} WebinizaDev Shop · Desarrollo y tecnología por WebinizaDev
                </p>
            </div>
            <div class="right-footer">
                <ul class="payment-box">
                    <li>
                        <img src="{{ asset('assets/images/icon/paymant/visa.png') }}" alt="Visa">
                    </li>
                    <li>
                        <img src="{{ asset('assets/images/icon/paymant/discover.png') }}" alt="Discover">
                    </li>
                    <li>
                        <img src="{{ asset('assets/images/icon/paymant/american.png') }}" alt="American Express">
                    </li>
                    <li>
                        <img src="{{ asset('assets/images/icon/paymant/master-card.png') }}" alt="Mastercard">
                    </li>
                    <li>
                        <img src="{{ asset('assets/images/icon/paymant/giro-pay.png') }}" alt="Otros medios de pago">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>