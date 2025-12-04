<header class="header-2">
    <div class="header-notification theme-bg-color overflow-hidden py-2">
<div class="notification-slider">
    <div>
        <div class="timer-notification text-center">
            <h6>
                <strong class="me-1">¡Bienvenido a WebinizaDev Shop!</strong>
                Descubrí nuevas ofertas y regalos especiales cada fin de semana.
                <strong class="ms-1">Cupón destacado: WEBINIZA25</strong>
            </h6>
        </div>
    </div>

    <div>
        <div class="timer-notification text-center">
            <h6>
                ¡Algo que te encanta está en oferta!
                <a href="{{ url('/tienda') }}" class="text-white">
                    ¡Comprar ahora!
                </a>
            </h6>
        </div>
    </div>
</div>

<button class="btn close-notification">
    <span>Cerrar</span>
    <i class="fas fa-times"></i>
</button>

</div>

<div class="top-nav top-header sticky-header sticky-header-3">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="navbar-top">
                    <button class="navbar-toggler d-xl-none d-block p-0 me-3" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                        <span class="navbar-toggler-icon">
                            <i class="iconly-Category icli theme-color"></i>
                        </span>
                    </button>

                    <a href="{{ url('/') }}" class="web-logo nav-logo">
                        <img src="{{ asset('assets/images/logo/3.png') }}"
                             class="img-fluid blur-up lazyload"
                             alt="Logo WebinizaDev Shop">
                    </a>

                    <div class="search-full">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i data-feather="search" class="font-light"></i>
                            </span>
                            <input type="text" class="form-control search-type"
                                   placeholder="Buscar productos...">
                            <span class="input-group-text close-search">
                                <i data-feather="x" class="font-light"></i>
                            </span>
                        </div>
                    </div>

                    <div class="middle-box">
                        <div class="center-box">
                            <div class="searchbar-box order-xl-1 d-none d-xl-block">
                                <input type="search" class="form-control"
                                       id="searchProductsInput"
                                       placeholder="Buscá productos y recibilos en tu domicilio...">
                                <button class="btn search-button">
                                    <i class="iconly-Search icli"></i>
                                </button>
                            </div>

                            <div class="location-box-2">
                                <button class="btn location-button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#locationModal">
                                    <i class="iconly-Location icli"></i>
                                    <span class="locat-name">Tu ubicación</span>
                                    <i class="fa-solid fa-angle-down down-arrow"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="rightside-menu">
                        <div class="dropdown-dollar">
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button"
                                        id="languageDropdown" data-bs-toggle="dropdown">
                                    <span>Idioma</span>
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)">Español</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)">Inglés</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="dropdown">
                                <button class="dropdown-toggle m-0" type="button"
                                        id="currencyDropdown" data-bs-toggle="dropdown">
                                    <span>Moneda</span>
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="currencyDropdown">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)">ARS</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)">USD</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)">EUR</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="option-list">
                            <ul>
                                <li>
                                    <a href="{{ route('login') }}"
                                       class="header-icon user-icon search-icon">
                                        <i class="iconly-Profile icli"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0)"
                                       class="header-icon search-box search-icon">
                                        <i class="iconly-Search icli"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('/comparar') }}" class="header-icon">
                                        <small class="badge-number">2</small>
                                        <i class="iconly-Swap icli"></i>
                                    </a>
                                </li>

                                <li class="onhover-dropdown">
                                    <a href="{{ url('/favoritos') }}"
                                       class="header-icon swap-icon">
                                        <i class="iconly-Heart icli"></i>
                                    </a>
                                </li>

                                <li class="onhover-dropdown">
                                    <a href="{{ url('/carrito') }}" class="header-icon bag-icon">
                                        <small class="badge-number">2</small>
                                        <i class="iconly-Bag-2 icli"></i>
                                    </a>

                                    <div class="onhover-div">
                                        <ul class="cart-list">
                                            <li>
                                                <div class="drop-cart">
                                                    <a href="{{ url('/producto/1') }}"
                                                       class="drop-image">
                                                        <img src="{{ asset('assets/images/vegetable/product/1.png') }}"
                                                             class="blur-up lazyload"
                                                             alt="Producto en carrito">
                                                    </a>

                                                    <div class="drop-contain">
                                                        <a href="{{ url('/producto/1') }}">
                                                            <h5>Galletas Choco Chip Súper Crocantes</h5>
                                                        </a>
                                                        <h6><span>1 x</span> $80,58</h6>
                                                        <button class="close-button">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="drop-cart">
                                                    <a href="{{ url('/producto/2') }}"
                                                       class="drop-image">
                                                        <img src="{{ asset('assets/images/vegetable/product/2.png') }}"
                                                             class="blur-up lazyload"
                                                             alt="Producto en carrito">
                                                    </a>

                                                    <div class="drop-contain">
                                                        <a href="{{ url('/producto/2') }}">
                                                            <h5>Cookies de Manteca de Maní Premium 600 g</h5>
                                                        </a>
                                                        <h6><span>1 x</span> $25,68</h6>
                                                        <button class="close-button">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="price-box">
                                            <h5>Total:</h5>
                                            <h4 class="theme-color fw-bold">$106,26</h4>
                                        </div>

                                        <div class="button-group">
                                            <a href="{{ url('/carrito') }}"
                                               class="btn btn-sm cart-button">
                                                Ver carrito
                                            </a>
                                            <a href="{{ url('/checkout') }}"
                                               class="btn btn-sm cart-button theme-bg-color text-white">
                                                Finalizar compra
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- .option-list -->
                    </div> <!-- .rightside-menu -->
                </div> <!-- .navbar-top -->
            </div>
        </div>
    </div>
</div>

<div class="container-fluid-lg">
    <div class="row">
        <div class="col-12">
            <div class="main-nav">
                <div class="right-nav">
                    <div class="nav-number">
                        <img src="{{ asset('assets/images/icon/music.png') }}"
                             class="img-fluid blur-up lazyload"
                             alt="Ícono teléfono">
                        <span>+54 381 123 4567</span>
                    </div>

                    <a href="javascript:void(0)"
                       class="btn theme-bg-color ms-3 fire-button"
                       data-bs-toggle="modal"
                       data-bs-target="#deal-box">
                        <div class="fire">
                            <img src="{{ asset('assets/images/icon/hot-sale.png') }}"
                                 class="img-fluid"
                                 alt="Ofertas destacadas">
                        </div>
                        <span>Ofertas destacadas</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</header>