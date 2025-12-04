<section class="newsletter-section-2 section-b-space">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="newsletter-box hover-effect">
                    <img src="{{ asset('assets/images/veg-3/shape/background.png') }}"
                         class="img-fluid bg-img"
                         alt="Fondo sección registro">

                    <div class="row">
                        <!-- Texto + botón registro -->
                        <div class="col-xxl-8 col-xl-7">
                            <div class="newsletter-detail p-center-left text-white">
                                <div>
                                    <h2>Creá tu cuenta y empezá a comprar</h2>
                                    <h4>
                                        Registrate gratis para guardar tus pedidos, seguir tus compras
                                        y acceder a ofertas exclusivas.
                                    </h4>

                                    <div class="mt-4">
                                        <button
                                            type="button"
                                            class="btn bg-white theme-color btn-md fw-500"
                                            onclick="window.location.href='{{ route('register') }}';">
                                            Registrarme ahora
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Imagen decorativa -->
                        <div class="col-xxl-4 col-xl-5 d-xl-block d-none">
                            <div class="shape-box">
                                <img src="{{ asset('assets/images/veg-3/shape/basket.png') }}"
                                     alt="Canasta de productos"
                                     class="img-fluid image-1">
                            </div>
                        </div>
                    </div> <!-- .row -->
                </div> <!-- .newsletter-box -->
            </div>
        </div>
    </div>
</section>
