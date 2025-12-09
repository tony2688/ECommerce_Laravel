@component('mail::message')
# ¡Oferta especial para vos! 🎁

Hola {{ $user->name }},

{{ $promoTitle ?? 'Tenemos una promoción especial' }}

{{ $promoDescription ?? 'Aprovechá descuentos exclusivos en productos seleccionados.' }}

@if(isset($promoCode))
    ## Código de descuento

    Usá el código **{{ $promoCode }}** al finalizar tu compra.
@endif

@component('mail::button', ['url' => url('/')])
Ver promociones
@endcomponent

@if(isset($expiryDate))
    Válido hasta: {{ $expiryDate }}
@endif

Saludos,
**El equipo de WebinizaDev Shop**
@endcomponent