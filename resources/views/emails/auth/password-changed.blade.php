@component('mail::message')
# Contraseña actualizada

Hola {{ $user->name }},

Te confirmamos que la contraseña de tu cuenta en **WebinizaDev Shop** fue cambiada exitosamente.

## Detalles del cambio

- **Fecha y hora**: {{ now()->format('d/m/Y H:i') }}
- **Email de la cuenta**: {{ $user->email }}

## ⚠️ ¿No fuiste vos?

Si **no realizaste este cambio**, tu cuenta podría estar comprometida.

Por favor, tomá estas acciones inmediatamente:

1. Cambiá tu contraseña de inmediato
2. Revisá la actividad reciente de tu cuenta
3. Contactanos si necesitás ayuda

@component('mail::button', ['url' => url('/forgot-password')])
Cambiar contraseña ahora
@endcomponent

## ✅ ¿Fuiste vos?

Si realizaste este cambio, podés ignorar este correo. Tu cuenta está segura.

---

**Nota de seguridad**: Nunca compartas tu contraseña con nadie. WebinizaDev Shop nunca te pedirá tu contraseña por
correo o teléfono.

Saludos,
**El equipo de WebinizaDev Shop**
@endcomponent