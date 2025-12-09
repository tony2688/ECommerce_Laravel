@extends('layouts.guest')

@section('title', 'Registrarse')

@section('content')
    <section class="log-in-section section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                {{-- Imagen lateral --}}
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{ asset('assets/images/inner-page/sign-up.png') }}" class="img-fluid"
                            alt="Registro en WebinizaDev Shop">
                    </div>
                </div>

                {{-- Formulario de registro --}}
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Crear cuenta</h3>
                            <h4>Únete a WebinizaDev Shop</h4>
                        </div>

                        <div class="input-box">
                            <form class="row g-4" method="POST" action="{{ route('register') }}">
                                @csrf

                                {{-- Nombre completo --}}
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}" required autofocus
                                            placeholder="Nombre completo">
                                        <label for="name">Nombre completo</label>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Correo electrónico --}}
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}" required
                                            placeholder="Correo electrónico">
                                        <label for="email">Correo electrónico</label>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Teléfono --}}
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" value="{{ old('phone') }}" required maxlength="20"
                                            placeholder="Teléfono de contacto">
                                        <label for="phone">Teléfono</label>
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Dirección (opcional) --}}
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                            name="address" placeholder="Dirección completa" rows="3"
                                            style="height: 100px">{{ old('address') }}</textarea>
                                        <label for="address">Dirección (opcional)</label>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Contraseña --}}
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" required autocomplete="new-password"
                                            placeholder="Contraseña">
                                        <label for="password">Contraseña</label>
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Confirmar contraseña --}}
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" required placeholder="Confirmar contraseña">
                                        <label for="password_confirmation">Confirmar contraseña</label>
                                    </div>
                                </div>

                                {{-- Rol por defecto: customer --}}
                                <input type="hidden" name="role" value="customer">

                                {{-- Aceptar términos (visual) --}}
                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox" id="terms">
                                            <label class="form-check-label" for="terms">
                                                Acepto los <span>Términos</span> y la <span>Política de privacidad</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                {{-- Botón registrar --}}
                                <div class="col-12">
                                    <button class="btn btn-animation w-100" type="submit">
                                        Crear cuenta
                                    </button>
                                </div>
                            </form>
                        </div>

                        {{-- Link a login --}}
                        <div class="sign-up-box">
                            <h4>¿Ya tenés una cuenta?</h4>
                            <a href="{{ route('login') }}">Iniciar sesión</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
            </div>
        </div>
    </section>
@endsection