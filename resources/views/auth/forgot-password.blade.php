@extends('layouts.guest')

@section('title', 'Recuperar contraseña')

@section('content')
    <section class="log-in-section section-b-space forgot-section">
        <div class="container-fluid-lg w-100">
            <div class="row">

                {{-- Imagen lateral --}}
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{ asset('assets/images/inner-page/forgot.png') }}" class="img-fluid"
                            alt="Recuperar contraseña">
                    </div>
                </div>

                {{-- Formulario --}}
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="log-in-box">

                            <div class="log-in-title">
                                <h3>¿Olvidaste tu contraseña?</h3>
                                <h4>
                                    Ingresá tu correo electrónico y te enviaremos un enlace
                                    para crear una nueva contraseña.
                                </h4>
                            </div>

                            {{-- Mensaje de estado (correo enviado) --}}
                            @if (session('status'))
                                <div class="alert alert-success small mb-4">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="input-box">
                                <form class="row g-4" method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating log-in-form">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email') }}" required autofocus
                                                placeholder="Correo electrónico">
                                            <label for="email">Correo electrónico</label>

                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-animation w-100" type="submit">
                                            Enviar enlace de recuperación
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="other-log-in">
                                <h6></h6>
                            </div>

                            <div class="sign-up-box">
                                <h4>¿Recordaste tu contraseña?</h4>
                                <a href="{{ route('login') }}">Iniciar sesión</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection