@component('mail::message')
# Recuperá tu contraseña

Hola,

Estás recibiendo este correo porque solicitaste restablecer la contraseña de tu cuenta en **WebinizaDev Shop**.

@component('mail::button', ['url' => $url])
Restablecer contraseña
@endcomponent

Este enlace de restablecimiento de contraseña expirará en **{{ $count }} minutos**.

Si no solicitaste restablecer tu contraseña, no necesitás realizar ninguna acción. Tu cuenta está segura.

Saludos,
**El equipo de WebinizaDev Shop**
@endcomponent