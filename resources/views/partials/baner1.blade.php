<section class="banner-section">
    <div class="container-fluid-lg">
        <div class="row gy-xl-0 gy-3">

            <!-- ================= Banner Izquierdo ================= -->
            <div class="col-xl-6">
                <div class="banner-contain-3 hover-effect">
                    <img src="{{ asset('assets/images/veg-3/banner/1.png') }}"
                         class="bg-img img-fluid"
                         alt="Verduras frescas y alimentos diarios">

                    <div class="banner-detail banner-details-dark text-white p-center-left w-50 position-relative mend-auto">
                        <div>
                            <h6 class="ls-expanded text-uppercase">Premium</h6>
                            <h3 class="mb-sm-3 mb-1">Verduras frescas y alimentos diarios</h3>
                            <h4>Obtené 50% de descuento</h4>

                            <button
                                class="btn theme-color bg-white btn-md fw-bold mt-sm-3 mt-1 mend-auto"
                                onclick="window.location.href='{{ url('/tienda') }}';">
                                Comprar ahora
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= Banner Derecho ================= -->
            <div class="col-xl-6">
                <div class="banner-contain-3 hover-effect">
                    <img src="{{ asset('assets/images/veg-3/banner/2.png') }}"
                         class="bg-img img-fluid"
                         alt="Frutas 100% naturales y saludables">

                    <div class="banner-detail text-dark p-center-left w-50 position-relative mend-auto">
                        <div>
                            <h6 class="ls-expanded text-uppercase">Disponible</h6>
                            <h3 class="mb-sm-3 mb-1">Frutas 100% Naturales </h3>
                            <h4 class="text-content">Especial de fin de semana</h4>

                            <button
                                class="btn theme-bg-color text-white btn-md fw-bold mt-sm-3 mt-1 mend-auto"
                                onclick="window.location.href='{{ url('/tienda') }}';">
                                Comprar ahora
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- row -->
    </div> <!-- container -->
</section>
