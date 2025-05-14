@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg border-0" style="width: 400px; background-color: #2f2f2f;">
            <!-- Form Header -->
            <div class="card-header text-center text-white" style="background-color: #0056b3;">
                <h4 class="mb-0" style="font-weight: bold;">Iniciar Sesión</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Field -->
                    <div class="row mb-4 position-relative">
                        <label for="email" class="col-form-label text-white" style="font-weight: bold;">Correo
                            Electrónico</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background-color: #004494; color: white;">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input id="email" type="text" name="email" class="form-control border-0 shadow-sm"
                                placeholder="Correo Electrónico" value="{{ old('email') }}" required autofocus
                                style="background-color: rgba(255, 255, 255, 0.1); color: white;">
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert" style="color: #ff4d4d;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="row mb-4 position-relative">
                        <label for="password" class="col-form-label text-white"
                            style="font-weight: bold;">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background-color: #004494; color: white;">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input id="password" type="password" name="password" class="form-control border-0 shadow-sm"
                                placeholder="Contraseña" required
                                style="background-color: rgba(255, 255, 255, 0.1); color: white;">
                            <span class="input-group-text toggle-password"
                                style="background-color: #004494; cursor: pointer;">
                                <i class="far fa-eye" id="togglePassword"></i>
                            </span>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert" style="color: #ff4d4d;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Login Button -->
                    <div class="row mb-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary shadow-sm login-btn">
                                <strong>Entrar</strong>
                            </button>
                        </div>
                    </div>

                    <!-- Links -->
                    <div class="text-center">
                        <p class="text-white">¿Olvidaste tu contraseña? <a href="{{ route('password.request') }}"
                                class="link-light highlight-link">Haz clic aquí</a></p>
                        <p class="text-white">¿No tienes cuenta? <a href="{{ route('register') }}"
                                class="link-light highlight-link">Regístrate</a></p>
                    </div>

                    <!-- Google Login -->
                    <div class="row mb-3">
                        <div class="d-grid gap-2">
                            <a href="{{ route('google.login') }}" class="btn btn-light shadow-sm"
                                style="background-color: white; color: #444;">
                                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo"
                                    width="20" class="me-2">
                                Iniciar sesión con Google
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="card-footer text-center text-white" style="background-color: #004494;">
                <small>&copy; {{ date('Y') }} Todos los derechos reservados.</small>
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(90deg, #2f2f2f, #0056b3);
            font-family: 'Arial', sans-serif;
            margin: 0;
            overflow: hidden;
            transition: background 0.5s ease-in-out;
        }

        body.scrolled {
            background: linear-gradient(90deg, #1c1c1c, #003a80);
        }

        .form-control:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(0, 86, 179, 0.5);
        }

        .toggle-password i {
            color: white;
        }

        .toggle-password:hover i {
            color: #00bcd4;
        }

        .btn-primary.login-btn {
            background: linear-gradient(90deg, #0056b3, #2f2f2f);
            border: none;
            transition: background-position 0.5s ease-in-out;
            background-size: 200%;
            background-position: left;
        }

        .btn-primary.login-btn:hover {
            background-position: right;
            transform: scale(1.05);
            transition: all 0.3s ease-in-out;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .input-group-text {
            border: none;
        }
    </style>

    <!-- Password Visibility Toggle & Scroll Effect -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.getElementById('togglePassword');

            togglePassword.addEventListener('click', function () {
                const passwordField = document.getElementById('password');
                const isPasswordVisible = passwordField.type === 'password';

                passwordField.type = isPasswordVisible ? 'text' : 'password';
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });

            window.addEventListener('scroll', function () {
                const body = document.body;
                body.classList.toggle('scrolled', window.scrollY > 0);
            });
        });
    </script>
@endsection
