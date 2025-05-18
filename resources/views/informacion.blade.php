
@extends('layouts.app') <!-- Asegúrate que este layout exista -->

@section('content')

    <div class="container mt-4">

        <div class="card shadow-lg">

            <div class="card-header bg-primary text-white text-center">
               <br><br>
                <h2>🎵 Conciertos en La Paz - Información General 🎵</h2>
            </div>
            <div class="d-flex justify-content-start mt-4 pl-4">
                <a href="{{ url('home') }}" class="btn btn-primary btn-sm">
                    ⬅️ Volver al inicio
                </a>
            </div>


            <div class="card-body">
                <!-- Descripción principal -->
                <section class="mb-4">
                    <h4>¿Qué es esta página?</h4>
                    <p>
                        Esta plataforma está dedicada a todos los fanáticos de la música en La Paz, Bolivia. Aquí podrás
                        descubrir los conciertos más esperados, comprar entradas según el sector de tu preferencia, hacer
                        reservas
                        anticipadas y mantenerte al tanto de las novedades de cada evento.
                    </p>
                </section>

                <!-- Información del evento -->
                <section class="mb-4">
                    <h4>🎤 Próximo Gran Concierto</h4>
                    <ul>
                        <li><strong>Artista:</strong> Camilo</li>
                        <li><strong>Fecha:</strong> 13/07/25</li>
                        <li><strong>Lugar:</strong> Estadio Hernando Siles, La Paz</li>
                        <li><strong>Hora:</strong> 20:00 hrs</li>
                    </ul>
                </section>

                <!-- Sectores -->
                <section class="mb-4">
                    <h4>🎟️ Sectores Disponibles</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card border-success mb-3">
                                <div class="card-header bg-success text-white">VIP</div>
                                <div class="card-body">
                                    <p class="card-text">Asientos exclusivos cerca del escenario. Incluye acceso
                                        preferencial y bebida gratis.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-warning mb-3">
                                <div class="card-header bg-warning text-dark">GOLD</div>
                                <div class="card-body">
                                    <p class="card-text">Buena vista al escenario y acceso rápido al recinto.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-info mb-3">
                                <div class="card-header bg-info text-white">GENERAL</div>
                                <div class="card-body">
                                    <p class="card-text">Acceso general al concierto. Zona amplia y cómoda.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Funcionalidades de la página -->
                <section class="mb-4">
                    <h4>🛠️ ¿Qué puedes hacer en esta página?</h4>
                    <ul>
                        <li>📅 <strong>Reservar entradas</strong> para conciertos.</li>
                        <li>💳 <strong>Comprar tickets</strong> por sector (VIP, GOLD, GENERAL).</li>
                        <li>🖨️ <strong>Visualizar y descargar tus tickets</strong> con código QR.</li>
                        <li>🔔 <strong>Recibir notificaciones</strong> sobre nuevos conciertos.</li>
                        <li>👤 <strong>Administrar tu perfil</strong> y tus reservas.</li>
                    </ul>
                </section>

                <!-- Normas -->
                <section class="mb-4">
                    <h4>📌 Normas del Concierto</h4>
                    <ul>
                        <li>Se debe portar entrada digital o impresa con QR válido.</li>
                        <li>No se permite el ingreso con objetos punzocortantes o sustancias ilegales.</li>
                        <li>Los menores de edad deben estar acompañados por un adulto.</li>
                        <li>No se permite grabar el concierto profesionalmente sin autorización.</li>
                        <li>Se recomienda llegar con al menos 1 hora de anticipación.</li>
                    </ul>
                </section>


            </div>
        </div>
    </div>
@endsection
