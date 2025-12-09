@extends('layouts.guest')

@section('title', 'Restablecer contraseña')

@section('content')
    <section class="log-in-section section-b-space forgot-section">
        <div class="container-fluid-lg w-100">
            <div class="row">

                {{-- Imagen lateral --}}
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{ asset('assets/images/inner-page/forgot.png') }}" class="img-fluid"
                            alt="Restablecer contraseña">
                    </div>
                </div>

                {{-- Formulario --}}
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="log-in-box">

                            <div class="log-in-title">
                                <h3>Restablecer contraseña</h3>
                                <h4>Ingresá tu nueva contraseña</h4>
                            </div>

                            <div class="input-box">
                                <form class="row g-4" method="POST" action="{{ route('password.store') }}">
                                    @csrf

                                    {{-- Token oculto --}}
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    {{-- Email --}}
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating log-in-form">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email', $request->email) }}" 
                                                required autofocus placeholder="Correo electrónico">
                                            <label for="email">Correo electrónico</label>

                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Nueva contraseña --}}
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating log-in-form">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password" required 
                                                placeholder="Nueva contraseña">
                                            <label for="password">Nueva contraseña</label>

                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Confirmar contraseña --}}
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating log-in-form">
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="password_confirmation" name="password_confirmation" required 
                                                placeholder="Confirmar contraseña">
                                            <label for="password_confirmation">Confirmar contraseña</label>

                                            @error('password_confirmation')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-animation w-100" type="submit">
                                            Restablecer contraseña
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection