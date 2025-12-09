@component('mail::message')
# ¡Tu pedido está en camino! 📦

Hola {{ $order->user->name }},

Tu pedido **#{{ $order->id }}** ha sido enviado.

## Información de envío

@if(isset($order->tracking_number))
    - **Número de seguimiento**: {{ $order->tracking_number }}
@endif
- **Dirección de envío**: {{ $order->shipping_address ?? $order->user->address }}
- **Fecha de envío**: {{ now()->format('d/m/Y') }}

@component('mail::button', ['url' => url('/mis-pedidos/' . $order->id)])
Rastrear mi pedido
@endcomponent

Estimamos que llegará en los próximos días hábiles.

Saludos,
**El equipo de WebinizaDev Shop**
@endcomponent