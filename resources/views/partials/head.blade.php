<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="description"
    content="Ecommerce WebinizaDev: tu tienda online para productos de calidad, compras rápidas y seguras.">
<meta name="keywords" content="ecommerce, tienda online, WebinizaDev, compras, ofertas, productos">
<meta name="author" content="WebinizaDev">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="user-authenticated" content="{{ auth()->check() ? 'true' : 'false' }}">

<link rel="icon" href="{{ asset('assets/images/favicon/4.png') }}" type="image/x-icon">

<!-- Fuentes de Google -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Russo+One&family=Exo+2:wght@400;500;600;700;800;900&family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

<!-- Bootstrap -->
<link id="rtl-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

<!-- Animaciones -->
<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">

<!-- Iconos / estilos extra -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bulk-style.css') }}">

<!-- Estilos principales del template -->
<link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">