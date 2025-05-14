@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar izquierdo -->
            <nav id="sidebar" class="col-md-3 col-lg-2 sidebar position-fixed h-100 transition-sidebar bg-dark text-light">
                <div class="position-sticky">
                    <!-- Logo -->
                    <div class="text-center py-4">
                        <img src="https://img.freepik.com/vector-gratis/fondo-frecuencia-melodia-digital-conciertos-entretenimiento_1017-51460.jpg?semt=ais_hybrid&w=740"
                            alt="Logo" id="sidebarLogo" class="img-fluid mb-2 transition-logo">
                        <h4 id="sidebarTitle" class="transition-title">Empresa</h4>
                    </div>
                    <ul class="nav flex-column">
                        @php $userRole = Auth::user()->role_id; @endphp

                        <li class="nav-item">
                            <a class="nav-link text-light d-flex align-items-center nav-hover" href="#">
                                <i class="fas fa-tachometer-alt icon-3d"></i>
                                <span class="sidebar-text ms-2">Página Principal</span>
                            </a>
                        </li>

                        @if (in_array($userRole, [1]))
                            <li class="nav-item">
                                <a class="nav-link text-light d-flex align-items-center nav-hover" href="usuarios">
                                    <i class="fas fa-users icon-3d"></i>
                                    <span class="sidebar-text ms-2">Usuarios</span>
                                </a>
                            </li>
                        @endif

                        @if (in_array($userRole, [1, 3]))
                            <li class="nav-item">
                                <a class="nav-link text-light d-flex align-items-center nav-hover" href="productos">
                                    <i class="fas fa-box icon-3d"></i>
                                    <span class="sidebar-text ms-2">Productos</span>
                                </a>
                            </li>
                        @endif

                        @if (in_array($userRole, [1, 2]))
                            <li class="nav-item">
                                <a class="nav-link text-light d-flex align-items-center nav-hover" href="#">
                                    <i class="fas fa-box icon-3d"></i>
                                    <span class="sidebar-text ms-2">Registro de productos</span>
                                </a>
                            </li>
                        @endif

                        @if (in_array($userRole, [1, 3]))
                            <li class="nav-item">
                                <a class="nav-link text-light d-flex align-items-center nav-hover"
                                    href="control-entradas-salidas">
                                    <i class="fas fa-box icon-3d"></i>
                                    <span class="sidebar-text ms-2">Control entradas y salidas</span>
                                </a>
                            </li>
                        @endif

                        @if (in_array($userRole, [1, 2, 3]))
                            <li class="nav-item">
                                <a class="nav-link text-light d-flex align-items-center nav-hover" href="#">
                                    <i class="fas fa-info-circle icon-3d"></i>
                                    <span class="sidebar-text ms-2">Información</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <!-- Contenido -->
            <main id="mainContent" class="col-md-9 ms-sm-auto col-lg-10 px-md-4 transition-main bg-light min-vh-100">
                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <button id="toggleSidebar" class="btn btn-primary transition-button">&#9776;</button>
                </div>

                <div class="mb-4">
                    <h2 class="fw-bold text-primary">🎵 Conciertos en La Paz - Teatro al Aire Libre</h2>
                    <p class="text-muted">Descubre los eventos más esperados que se llevarán a cabo en uno de los escenarios más
                        icónicos de Bolivia.</p>
                </div>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

                    <!-- Evento 1 -->
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="https://images.mnstatic.com/55/71/5571ff88165370982b6a83aa1d5edf46.jpg" class="card-img-top"
                                alt="Luis Fonsi">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Luis Fonsi - Noche Romántica</h5>
                                <p class="card-text"><strong>Fecha:</strong> 20 de julio de 2025<br>
                                    <strong>Hora:</strong> 20:00<br>
                                    <strong>Lugar:</strong> Teatro al Aire Libre Jaime Laredo
                                </p>
                                <p class="card-text text-muted">Una velada especial con el artista puertorriqueño y sus más grandes
                                    éxitos románticos y bailables.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Evento 2 -->
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="https://images.mnstatic.com/55/71/5571ff88165370982b6a83aa1d5edf46.jpg" class="card-img-top"
                                alt="Maná">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Maná - Gira Latinoamérica 2025</h5>
                                <p class="card-text"><strong>Fecha:</strong> 3 de agosto de 2025<br>
                                    <strong>Hora:</strong> 21:00<br>
                                    <strong>Lugar:</strong> Teatro al Aire Libre Jaime Laredo
                                </p>
                                <p class="card-text text-muted">Un reencuentro inolvidable con la legendaria banda mexicana de rock.
                                    ¡Canta y vibra con sus clásicos!</p>
                            </div>
                        </div>
                    </div>

                    <!-- Evento 3 -->
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="https://images.mnstatic.com/55/71/5571ff88165370982b6a83aa1d5edf46.jpg" class="card-img-top"
                                alt="Morat">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Morat - Tour Antes de Que Amanezca</h5>
                                <p class="card-text"><strong>Fecha:</strong> 18 de agosto de 2025<br>
                                    <strong>Hora:</strong> 19:30<br>
                                    <strong>Lugar:</strong> Teatro al Aire Libre Jaime Laredo
                                </p>
                                <p class="card-text text-muted">Pop, folk y mucho amor en una noche con el grupo colombiano más
                                    querido por la juventud.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Evento 4 -->
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="https://images.mnstatic.com/55/71/5571ff88165370982b6a83aa1d5edf46.jpg" class="card-img-top"
                                alt="DJ Tiësto">
                            <div class="card-body">
                                <h5 class="card-title text-primary">DJ Tiësto - Live in La Paz</h5>
                                <p class="card-text"><strong>Fecha:</strong> 7 de septiembre de 2025<br>
                                    <strong>Hora:</strong> 22:00<br>
                                    <strong>Lugar:</strong> Teatro al Aire Libre Jaime Laredo
                                </p>
                                <p class="card-text text-muted">Prepárate para una noche épica de beats electrónicos y visuales
                                    envolventes con uno de los mejores DJs del mundo.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-5 text-center">
                    <p class="text-muted fst-italic">* Los horarios y artistas pueden estar sujetos a cambios. Revisa las redes
                        oficiales para más información.</p>
                </div>
            </main>

        </div>
    </div>

    <!-- Script de toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const toggleButton = document.getElementById('toggleSidebar');
            const sidebarTitle = document.getElementById('sidebarTitle');
            const sidebarLogo = document.getElementById('sidebarLogo');

            toggleButton.onclick = () => {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('collapsed-main');
                toggleButton.classList.toggle('collapsed-button');
                sidebarTitle.classList.toggle('hidden-title');
                sidebarLogo.classList.toggle('collapsed-logo');
            };
        });
    </script>

    <!-- Estilos -->
    <style>
        /* Sidebar */
        .transition-sidebar {
            transition: width 0.4s ease-in-out;
        }

        #sidebar {
            width: 250px;
            background-color: #343a40 !important;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
        }

        #sidebar.collapsed {
            width: 70px;
        }

        #sidebar.collapsed .sidebar-text {
            display: none;
        }

        #sidebar.collapsed .nav-link {
            justify-content: center;
        }

        /* Título */
        .transition-title {
            transition: opacity 0.3s ease-in-out;
        }

        .hidden-title {
            opacity: 0;
        }

        /* Logo */
        .transition-logo {
            transition: transform 0.3s ease, width 0.3s ease, height 0.3s ease;
            max-width: 150px;
        }

        .collapsed-logo {
            transform: scale(1.4);
            max-width: 35px;
        }

        /* Main */
        .transition-main {
            transition: margin-left 0.4s ease-in-out;
        }

        #mainContent {
            margin-left: 250px;
        }

        #mainContent.collapsed-main {
            margin-left: 70px;
        }

        /* Botón toggle */
        .transition-button {
            position: relative;
            left: -25px;
            z-index: 1050;
            transition: left 0.4s ease-in-out;
        }

        .collapsed-button {
            left: -220px;
        }

        /* Hover */
        .nav-hover {
            transition: transform 0.3s ease, background-color 0.3s ease, color 0.3s ease;
        }

        .nav-hover:hover {
            background-color: #0d6efd;
            /* Azul */
            color: #ffffff;
            transform: scale(1.05);
            border-radius: 0.5rem;
        }

        .nav-hover i {
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .nav-hover:hover i {
            color: #ffc107;
            /* Amarillo dorado */
            transform: rotate(15deg);
        }

        /* Icon 3D */
        .icon-3d {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        /* Card */
        .card-header {
            background-color: #0d6efd !important;
            color: white !important;
        }
    </style>
@endsection
