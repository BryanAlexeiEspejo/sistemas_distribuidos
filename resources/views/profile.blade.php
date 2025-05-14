@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-right">
            <!-- Botón Volver en la parte superior derecha -->
            <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Volver</a>
        </div>
    </div>

    <h2>Perfil de {{ $user->nombre }} {{ $user->apellido }}</h2>

    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" value="{{ $user->nombre }}" disabled>
    </div>

    <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" id="apellido" value="{{ $user->apellido }}" disabled>
    </div>

    <div class="form-group">
        <label for="email">Correo Electrónico</label>
        <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
    </div>

    <!-- Mensajes de éxito o error -->
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif

    <!-- Botón para abrir el modal de cambio de contraseña -->
    <button type="button" class="btn btn-warning mt-3" id="change-password-btn">Cambiar Contraseña</button>

    <!-- Modal de cambio de contraseña -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog"
        aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Cambiar Contraseña</h5>
                    <!-- Botón de cierre funcional -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="password">Nueva Contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Ingrese su nueva contraseña" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" id="toggle-password">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Confirme su nueva contraseña" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary"
                                        id="toggle-password-confirmation">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script para el modal y la visibilidad de contraseñas -->
<script>
    // Mostrar el modal
    document.getElementById('change-password-btn').addEventListener('click', function () {
        $('#changePasswordModal').modal('show');
    });

    // Ocultar el modal al presionar el botón de cierre
    $('.close').on('click', function () {
        $('#changePasswordModal').modal('hide');
    });

    // Toggle visibility de la contraseña
    document.getElementById('toggle-password').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const icon = this.querySelector('i');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    // Toggle visibility de la confirmación de contraseña
    document.getElementById('toggle-password-confirmation').addEventListener('click', function () {
        const passwordConfirmationField = document.getElementById('password_confirmation');
        const icon = this.querySelector('i');
        if (passwordConfirmationField.type === 'password') {
            passwordConfirmationField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordConfirmationField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>

<!-- Incluir las dependencias necesarias -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
