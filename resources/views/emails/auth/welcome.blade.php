@component('mail::message')
# ¡Hola {{ $user->name }}! 👋

Gracias por registrarte en **WebinizaDev Shop**.

A partir de ahora vas a poder:

- Guardar tus datos de envío.
- Ver el historial de tus pedidos.
- Acceder a promociones exclusivas para clientes registrados.

@component('mail::button', ['url' => url('/')])
Explorar la tienda
@endcomponent

Si no creaste esta cuenta, podés ignorar este correo.

Saludos,
**El equipo de WebinizaDev Shop**
@endcomponent