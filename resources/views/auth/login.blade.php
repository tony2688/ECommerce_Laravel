@extends('layouts.guest')

@section('title', 'Iniciar Session')

@section('content')

    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="../assets/images/inner-page/log-in.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Bienvenido a WebinizaDev Shop</h3>
                            <h4>Inicia sesión en tu cuenta</h4>
                        </div>

                        {{-- Mostrar estado de sesión (ej: email de verificación enviado) --}}
                        @if (session('status'))
                            <div class="alert alert-success mb-3" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="input-box">
                            <form method="POST" action="{{ route('login') }}" class="row g-4">
                                @csrf

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}" placeholder="Email Address"
                                            required autofocus autocomplete="username">
                                        <label for="email">Correo Electrónico</label>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Password" required
                                            autocomplete="current-password">
                                        <label for="password">Contraseña</label>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox" name="remember"
                                                id="remember_me">
                                            <label class="form-check-label" for="remember_me">Recuérdame</label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="forgot-password">
                                                ¿Olvidaste tu contraseña?
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">
                                        Iniciar Sesión
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>¿No tienes una cuenta?</h4>
                            <a href="{{ route('register') }}">Regístrate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection