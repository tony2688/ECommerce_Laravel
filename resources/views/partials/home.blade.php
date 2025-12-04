<section class="home-section-2 home-section-small section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-4">

            {{-- Banner principal --}}
            <div class="col-xxl-6 col-md-8">
                <div class="home-contain h-100">
                    <img src="{{ asset('assets/images/veg-3/home/1.png') }}"
                         class="img-fluid bg-img blur-up lazyload"
                         alt="Productos frescos y orgánicos">
                    <div class="home-detail home-width p-center-left position-relative">
                        <div>
                            <h6 class="ls-expanded theme-color">ORGÁNICO</h6>
                            <h1 class="fw-bold w-100">100% fresco</h1>
                            <h3 class="text-content fw-light">Frutas y verduras seleccionadas</h3>
                            <p class="d-sm-block d-none">
                                Envíos rápidos en tu ciudad. Vos elegís, nosotros lo llevamos a tu puerta.
                            </p>
                            <button
                                onclick="window.location.href='{{ url('/tienda') }}';"
                                class="btn mt-sm-4 btn-2 theme-bg-color text-white mend-auto btn-2-animation">
                                Ver productos
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Banner lateral mediano --}}
            <div class="col-xxl-3 col-md-4 ratio_medium d-md-block d-none">
                <div class="home-contain home-small h-100">
                    <div class="h-100">
                        <img src="{{ asset('assets/images/veg-3/home/2.png') }}"
                             class="img-fluid bg-img blur-up lazyload"
                             alt="Mercado de productos orgánicos">
                    </div>
                    <div class="home-detail text-center p-top-center w-100 text-white">
                        <div>
                            <h4 class="fw-bold">Fresco y 100% orgánico</h4>
                            <h5 class="text-center">Directo del productor</h5>
                            <button
                                class="btn bg-white theme-color mt-3 home-button mx-auto btn-2"
                                onclick="window.location.href='{{ url('/tienda') }}';">
                                Comprar ahora
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Banners pequeños lado derecho --}}
            <div class="col-xxl-3 ratio_65 d-xxl-block d-none">
                <div class="row g-3">

                    <div class="col-xxl-12 col-sm-6">
                        <div class="home-contain">
                            <a href="{{ url('/tienda') }}">
                                <img src="{{ asset('assets/images/veg-3/home/3.png') }}"
                                     class="img-fluid bg-img blur-up lazyload"
                                     alt="Estilo de vida saludable con productos orgánicos">
                            </a>
                            <div class="home-detail text-white p-center text-center">
                                <div>
                                    <h4 class="text-center">Estilo de vida saludable</h4>
                                    <h5 class="text-center">Las mejores ofertas del fin de semana</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-12 col-sm-6">
                        <div class="home-contain">
                            <a href="{{ url('/tienda') }}">
                                <img src="{{ asset('assets/images/veg-3/home/4.png') }}"
                                     class="img-fluid bg-img blur-up lazyload"
                                     alt="Descuentos en productos saludables">
                            </a>
                            <div class="home-detail text-white w-50 p-center-left home-p-sm">
                                <div>
                                    <h4 class="fw-bold">Alimentos seguros, vidas más sanas</h4>
                                    <h5>Descuentos especiales</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- .row -->
            </div>

        </div>
    </div>
</section>
