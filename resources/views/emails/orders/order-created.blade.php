@component('mail::message')
# ¡Pedido confirmado! 🎉

Hola {{ $order->user->name }},

Tu pedido **#{{ $order->id }}** ha sido creado exitosamente.

## Resumen del pedido

- **Total**: ${{ number_format($order->total, 2) }}
- **Estado**: {{ $order->status }}
- **Fecha**: {{ $order->created_at->format('d/m/Y H:i') }}

@component('mail::button', ['url' => url('/mis-pedidos/' . $order->id)])
Ver detalles del pedido
@endcomponent

Te notificaremos cuando tu pedido sea procesado.

Saludos,
**El equipo de WebinizaDev Shop**
@endcomponent