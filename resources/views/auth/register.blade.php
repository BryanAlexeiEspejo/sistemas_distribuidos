@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg border-0" style="width: 400px; background-color: #3e3e3e;">
            <div class="card-header text-center text-white" style="background-color: #031293;">
                <h4 class="mb-0" style="font-weight: bold;">Registro</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label text-white">Nombre</label>
                        <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}"
                            required>
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Apellido -->
                    <div class="mb-3">
                        <label for="apellido" class="form-label text-white">Apellido</label>
                        <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}"
                            required>
                        @error('apellido')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Correo Electrónico</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                            required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label text-white">Contraseña</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label text-white">Confirmar Contraseña</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                            required>
                    </div>

                    <!-- Género -->
                    <div class="mb-3">
                        <label for="genero_id" class="form-label text-white">Género</label>
                        <select id="genero_id" class="form-control" name="genero_id" required>
                            <option value="">Seleccione...</option>
                            @foreach ($generos as $genero)
                                <option value="{{ $genero->id_genero }}">{{ $genero->nombre_genero }}</option>
                            @endforeach
                        </select>
                        @error('genero_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Botón de Registro -->
                    <div class="row mb-3">
                        <button type="submit" class="btn btn-primary login-btn">Registrarse</button>
                    </div>

                    <!-- Divider -->
                    <div class="text-center mt-3">
                        <span class="text-white">O</span>
                    </div>

                    <!-- Google Register -->
                    <div class="text-center mt-2">
                        <a href="{{ route('google.login') }}" class="btn btn-light w-100"
                            style="display: flex; align-items: center; justify-content: center;">
                            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo"
                                style="height: 20px; margin-right: 8px;">
                            Registrarse con Google
                        </a>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="card-footer text-center text-white" style="background-color: #031293;"></div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(90deg, #031293, #3e3e3e);
            font-family: 'Arial', sans-serif;
            margin: 0;
            overflow: hidden;
            transition: background 0.5s ease-in-out;
        }

        .text-danger {
            color: #fa0307;
            font-weight: bold;
            font-size: 1rem;
            margin-top: 5px;
            display: block;
        }

        .text-danger::before {
            content: "⚠️ ";
            font-size: 1.1rem;
            margin-right: 5px;
        }

        body.scrolled {
            background: linear-gradient(90deg, #3e3e3e, #031293);
        }

        .btn-primary.login-btn {
            background: linear-gradient(90deg, #031293, #3e3e3e);
            border: none;
            transition: background-position 0.5s ease-in-out, transform 0.3s ease, box-shadow 0.3s ease;
            background-size: 200%;
            background-position: left;
        }

        .btn-primary.login-btn:hover {
            background-position: right;
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .form-control:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(3, 18, 147, 0.5);
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
    </style>

    <!-- Scroll Effect -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.addEventListener('scroll', function () {
                const body = document.body;
                if (window.scrollY > 0) {
                    body.classList.add('scrolled');
                } else {
                    body.classList.remove('scrolled');
                }
            });
        });
    </script>
@endsection
