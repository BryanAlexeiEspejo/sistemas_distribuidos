@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-gradient-to-r from-gray-100 to-blue-100 rounded-xl shadow-xl">
    <div class="mb-6">
        <a href="{{ url('home') }}" class="inline-block bg-blue-600 text-white px-4 py-2 text-sm rounded hover:bg-blue-700">
            ⬅️ Volver al inicio
        </a>
    </div>

    <h2 class="text-2xl font-bold text-blue-600 mb-4">Perfil de {{ $user->nombre }} {{ $user->apellido }}</h2>

    <div class="mb-4">
        <label for="nombre" class="block font-semibold text-gray-700">Nombre</label>
        <input type="text" id="nombre" value="{{ $user->nombre }}" disabled class="w-full bg-white border border-gray-300 rounded px-4 py-2 text-gray-700 font-medium">
    </div>

    <div class="mb-4">
        <label for="apellido" class="block font-semibold text-gray-700">Apellido</label>
        <input type="text" id="apellido" value="{{ $user->apellido }}" disabled class="w-full bg-white border border-gray-300 rounded px-4 py-2 text-gray-700 font-medium">
    </div>

    <div class="mb-4">
        <label for="email" class="block font-semibold text-gray-700">Correo Electrónico</label>
        <input type="email" id="email" value="{{ $user->email }}" disabled class="w-full bg-white border border-gray-300 rounded px-4 py-2 text-gray-700 font-medium">
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <button id="change-password-btn" type="button" class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-4 py-2 rounded">
        Cambiar Contraseña
    </button>
</div>

<!-- Modal -->
<div id="changePasswordModal" class="fixed inset-0 hidden z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
        <div class="bg-blue-600 text-white text-lg font-semibold rounded-t-lg px-4 py-3 flex justify-between items-center">
            <h5 class="m-0">Cambiar Contraseña</h5>
            <button id="close-modal" class="text-white text-2xl leading-none">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ route('profile') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="password" class="block font-semibold text-gray-700">Nueva Contraseña</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" required placeholder="Ingrese su nueva contraseña" class="w-full border border-gray-300 rounded px-4 py-2">
                        <button type="button" id="toggle-password" class="absolute right-2 top-2 text-blue-600">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block font-semibold text-gray-700">Confirmar Contraseña</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Confirme su nueva contraseña" class="w-full border border-gray-300 rounded px-4 py-2">
                        <button type="button" id="toggle-password-confirmation" class="absolute right-2 top-2 text-blue-600">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="genero_id" class="block font-semibold text-gray-700">Género</label>
                    <select name="genero_id" id="genero_id" required class="w-full border border-gray-300 rounded px-4 py-2">
                        @foreach ($generos as $genero)
                            <option value="{{ $genero->id_genero }}" {{ $user->genero_id == $genero->id_genero ? 'selected' : '' }}>
                                {{ $genero->nombre_genero }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Actualizar Contraseña
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script -->
<script>
    document.getElementById('change-password-btn').addEventListener('click', () => {
        document.getElementById('changePasswordModal').classList.remove('hidden');
    });

    document.getElementById('close-modal').addEventListener('click', () => {
        document.getElementById('changePasswordModal').classList.add('hidden');
    });

    document.getElementById('toggle-password').addEventListener('click', function () {
        const field = document.getElementById('password');
        const icon = this.querySelector('i');
        field.type = field.type === 'password' ? 'text' : 'password';
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    });

    document.getElementById('toggle-password-confirmation').addEventListener('click', function () {
        const field = document.getElementById('password_confirmation');
        const icon = this.querySelector('i');
        field.type = field.type === 'password' ? 'text' : 'password';
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    });
</script>

<!-- FontAwesome para íconos -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
