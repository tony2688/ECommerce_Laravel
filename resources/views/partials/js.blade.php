<!-- jQuery (núcleo) -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>

<!-- Bootstrap (incluye Popper) -->
<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

<!-- Feather Icons -->
<script src="{{ asset('assets/js/feather/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/feather/feather-icon.js') }}"></script>

<!-- Carga diferida de imágenes -->
<script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>

<!-- Slick (sliders y carruseles) -->
<script src="{{ asset('assets/js/slick/slick.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/js/slick/custom_slick.js') }}"></script>

<!-- Ajuste automático de altura -->
<script src="{{ asset('assets/js/auto-height.js') }}"></script>

{{-- Control de cantidades en el carrito --}}
{{-- DESHABILITADO: Causaba duplicación con cart.js --}}
{{--
<script src="{{ asset('assets/js/quantity.js') }}"></script> --}}

<!-- Contadores / temporizadores (solo si existen en la página) -->
@if(View::hasSection('has-timers') || request()->is('/'))
    <script src="{{ asset('assets/js/timer1.js') }}"></script>
    <script src="{{ asset('assets/js/timer2.js') }}"></script>
    <script src="{{ asset('assets/js/timer3.js') }}"></script>
    <script src="{{ asset('assets/js/timer4.js') }}"></script>
@endif

<!-- Animaciones al hacer scroll -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/custom-wow.js') }}"></script>

<!-- Lógica principal del template -->
<script src="{{ asset('assets/js/script.js') }}"></script>

<!-- Funcionalidad de Carrito y Lista de Deseos -->
<script src="{{ asset('assets/js/wishlist.js') }}"></script>
<script src="{{ asset('assets/js/cart.js') }}"></script>

<!-- Configuración de tema (modo oscuro, colores, etc.) -->
<script src="{{ asset('assets/js/theme-setting.js') }}"></script>