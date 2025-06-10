@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Mi Perfil</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">👤 {{ $profile->user->username }}</h5>
                <p class="card-text"><strong>Correo electrónico:</strong> {{ $profile->user->email }}</p>
                <p class="card-text"><strong>Nombre:</strong> {{ $profile->first_name }} {{ $profile->last_name }}</p>
                <p class="card-text"><strong>Documento:</strong> {{ $profile->doc_number }}</p>
                <p class="card-text"><strong>Fecha de nacimiento:</strong> {{ $profile->birth_date }}</p>
                <p class="card-text"><strong>Género:</strong> {{ $profile->gender }}</p>
                <p class="card-text"><strong>Biografía:</strong> {{ $profile->bio }}</p>
                <p class="card-text"><strong>Sitio web:</strong> <a href="{{ $profile->website_url }}"
                        target="_blank">{{ $profile->website_url }}</a></p>
            </div>
        </div>

        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
@endsection
