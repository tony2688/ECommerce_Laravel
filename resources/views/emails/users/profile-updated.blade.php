@component('mail::message')
# Perfil actualizado ✓

Hola {{ $user->name }},

Tu perfil ha sido actualizado exitosamente.

## Cambios realizados

@if(isset($changes) && is_array($changes))
    @foreach($changes as $field => $value)
        - **{{ ucfirst($field) }}**: {{ $value }}
    @endforeach
@else
    Se han guardado los cambios en tu perfil.
@endif

Si no realizaste estos cambios, por favor contactanos de inmediato.

@component('mail::button', ['url' => url('/perfil')])
Ver mi perfil
@endcomponent

Saludos,
**El equipo de WebinizaDev Shop**
@endcomponent