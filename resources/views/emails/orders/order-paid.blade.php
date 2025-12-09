@component('mail::message')
# ¡Pago confirmado! ✅

Hola {{ $order->user->name }},

Hemos recibido el pago de tu pedido **#{{ $order->id }}**.

## Detalles del pago

- **Monto**: ${{ number_format($order->total, 2) }}
- **Método de pago**: {{ $order->payment_method ?? 'No especificado' }}
- **Fecha**: {{ now()->format('d/m/Y H:i') }}

Tu pedido está siendo preparado para el envío.

@component('mail::button', ['url' => url('/mis-pedidos/' . $order->id)])
Ver estado del pedido
@endcomponent

Saludos,
**El equipo de WebinizaDev Shop**
@endcomponent