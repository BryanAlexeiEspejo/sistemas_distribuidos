@extends('layouts.app')

@section('content')
                                            <style>
                                                body {
                                                    background-color: #f8f9fa;
                                                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                                                }

                                                .navbar-main {
                                                    background-color: #1e1e1e;
                                                    padding: 0.5rem 1rem;
                                                    z-index: 1050;
                                                }

                                                .navbar-main .nav-link {
                                                    color: #fff !important;
                                                    margin-right: 1rem;
                                                }

                                                .navbar-main .nav-link:hover {
                                                    background-color: #343a40;
                                                    border-radius: 0.25rem;
                                                }

                                                .dropdown-menu {
                                                    position: absolute !important;
                                                }

                                                .dropdown-menu-end {
                                                    right: 0;
                                                    left: auto;
                                                }

                                                .body-padding {
                                                    padding-top: 72px;
                                                }

                                                h2,
                                                h5 {
                                                    font-weight: bold;
                                                }

                                                .card-custom {
                                                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                                                }

                                                .card-custom:hover {
                                                    transform: translateY(-5px);
                                                    box-shadow: 0 0.8rem 1.5rem rgba(0, 0, 0, 0.15);
                                                }

                                                .card-img-top {
                                                    object-fit: cover;
                                                    height: 220px;
                                                }

                                                .footer-note {
                                                    font-style: italic;
                                                    font-size: 0.9rem;
                                                    color: #6c757d;
                                                }
                                            </style>

                                            <!-- NAVBAR PRINCIPAL -->
                                            <nav class="navbar navbar-dark navbar-main fixed-top">
                                                <div class="container-fluid d-flex justify-content-between align-items-center">
                                                    <a class="navbar-brand fw-bold text-white" href="/home">🎟️ TicketNow</a>

                                                    @auth
                                                                                                                                                                    <ul class="navbar-nav flex-row align-items-center">
                                                                                                                                                                        <li class="nav-item"><a class="nav-link" href="/home">🏠 Inicio</a></li>

                                                                                                                                                                        {{-- Solo Admin (rol 1) y Editor (rol 2) pueden ver Eventos --}}
                                                                                                                                                                        @if(in_array(Auth::user()->role_id, [2]))
                                                                                                                                                                            <li class="nav-item"><a class="nav-link" href="/events">🎤 Eventos</a></li>
                                                                                                                                                                        @endif

                                                                                                                                                                        {{-- Solo Admin puede ver Usuarios
                                                                                                                                                                        @if(Auth::user()->role_id === 1)
                                                                                                                                                                            <li class="nav-item"><a class="nav-link" href="/usuarios">👥 Usuarios</a></li>
                                                                                                                                                                        @endif
                                                        --}}
                                                                                                                                                                        {{-- Admin y Editor--}}
                                                                                                                                                                        @if(in_array(Auth::user()->role_id, [1, 2, 3]))
                                                                                                                                                                            <li class="nav-item"><a class="nav-link" href="/ticket">🛡️ ticket</a></li>
                                                                                                                                                                        @endif

                                                                                                                                                                        @if(in_array(Auth::user()->role_id, [1, 2, 3]))
                                                                                                                                                                            <li class="nav-item"><a class="nav-link" href="/ticket">🛡️ ticket</a></li>
                                                                                                                                                                        @endif

                                                                                                                                                                        {{-- Todos los roles pueden ver tipos y estado de eventos
                                                                                                                                                                        <li class="nav-item"><a class="nav-link" href="/event_types">📍 Tipos de eventos</a></li>
                                                                                                                                                                        <li class="nav-item"><a class="nav-link" href="/informacion">📍 Informacion</a></li>
                                                                                                --}}
                                                                                                                                                                        <!-- Dropdown de usuario -->
                                                                                                                                                                        <li class="nav-item dropdown">
                                                                                                                                                                            <a class="nav-link dropdown-toggle text-capitalize" href="#" id="userDropdown" role="button"
                                                                                                                                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                                                                                                {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
                                                                                                                                                                            </a>
                                                                                                                                                                            <ul class="dropdown-menu dropdown-menu-end mt-2 shadow-sm" aria-labelledby="userDropdown">
                                                                                                                                                                                <li><a class="dropdown-item" href="/profile">Mi perfil</a></li>
                                                                                                                                                                                <li><a class="dropdown-item" href="/settings">Configuración</a></li>
                                                                                                                                                                                <li>
                                                                                                                                                                                    <hr class="dropdown-divider">
                                                                                                                                                                                </li>
                                                                                                                                                                                <li>
                                                                                                                                                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                                                                                                                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                                                                                                                                        Cerrar sesión
                                                                                                                                                                                    </a>
                                                                                                                                                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                                                                                                                                        @csrf
                                                                                                                                                                                    </form>
                                                                                                                                                                                </li>
                                                                                                                                                                            </ul>
                                                                                                                                                                        </li>

                                                                                                                                                                    </ul>
                                                    @endauth
                                                </div>
                                            </nav>

                                            <!-- CONTENIDO PRINCIPAL -->
                                            <div class="container-fluid body-padding">
                                                <main id="mainContent" class="px-md-4 bg-light min-vh-100">
                                                    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                                                        <h2 class="fw-bold text-primary">🎵 Conciertos en La Paz - Teatro al Aire Libre</h2>
                                                    </div>

                                                    <p class="text-muted fs-5">Descubre los eventos más esperados que se llevarán a cabo en uno de los escenarios
                                                        más icónicos de Bolivia.</p>

                                                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                                        @php
    $eventos = [
        ['titulo' => 'Luis Fonsi - Noche Romántica', 'fecha' => '20 de julio de 2025', 'hora' => '20:00', 'descripcion' => 'Una velada especial con el artista puertorriqueño y sus más grandes éxitos románticos y bailables.'],
        ['titulo' => 'Maná - Gira Latinoamérica 2025', 'fecha' => '3 de agosto de 2025', 'hora' => '21:00', 'descripcion' => 'Un reencuentro inolvidable con la legendaria banda mexicana de rock. ¡Canta y vibra con sus clásicos!'],
        ['titulo' => 'Morat - Tour Antes de Que Amanezca', 'fecha' => '18 de agosto de 2025', 'hora' => '19:30', 'descripcion' => 'Pop, folk y mucho amor en una noche con el grupo colombiano más querido por la juventud.'],
        ['titulo' => 'DJ Tiësto - Live in La Paz', 'fecha' => '7 de septiembre de 2025', 'hora' => '22:00', 'descripcion' => 'Prepárate para una noche épica de beats electrónicos y visuales envolventes con uno de los mejores DJs del mundo.'],
    ];
                                                        @endphp

                                                        @foreach ($eventos as $evento)
                                                            <div class="col">
                                                                <div class="card card-custom h-100 border-0 bg-white">
                                                                    <img src="https://images.mnstatic.com/55/71/5571ff88165370982b6a83aa1d5edf46.jpg"
                                                                        class="card-img-top" alt="{{ $evento['titulo'] }}">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title text-primary">{{ $evento['titulo'] }}</h5>
                                                                        <p class="card-text mb-1">
                                                                            <strong>📅 Fecha:</strong> {{ $evento['fecha'] }}<br>
                                                                            <strong>🕒 Hora:</strong> {{ $evento['hora'] }}<br>
                                                                            <strong>📍 Lugar:</strong> Teatro al Aire Libre Jaime Laredo
                                                                        </p>
                                                                        <p class="card-text text-muted mt-2">{{ $evento['descripcion'] }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <div class="mt-5 text-center">
                                                        <p class="footer-note">* Los horarios y artistas pueden estar sujetos a cambios. Revisa las redes oficiales
                                                            para más información.</p>
                                                    </div>
                                                </main>
                                            </div>
@endsection
