<!DOCTYPE html>
<html lang="es">

<head>
    <title>@yield('title', 'Iniciar Sesión') - WebinizaDev Shop</title>
    @include('partials.head')
</head>

<body class="theme-color-2">

    {{-- Header mínimo solo con logo --}}
    <header class="header-2">
        <div class="top-nav top-header">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="navbar-top">
                            <a href="{{ url('/') }}" class="web-logo nav-logo mx-auto d-block text-center">
                                <img src="{{ asset('assets/images/logo/3.png') }}" class="img-fluid blur-up lazyload"
                                    alt="Logo WebinizaDev Shop">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    {{-- Footer --}}
    @include('partials.footer')

    @include('partials.js')
</body>

</html>