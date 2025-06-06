@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <div class="bg-white shadow-lg rounded-lg">
        <div class="bg-blue-600 text-white text-center py-6 rounded-t-lg">
            <h2 class="text-2xl font-bold">🎵 Conciertos en La Paz - Información General 🎵</h2>
        </div>

        <div class="mt-4 ml-4">
            <a href="{{ url('home') }}" class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700">
                ⬅️ Volver al inicio
            </a>
        </div>

        <div class="p-6">
            <!-- Descripción principal -->
            <div class="border border-gray-300 rounded mb-6">
                <div class="bg-gray-100 px-4 py-3 border-b border-gray-300 rounded-t">
                    <h4 class="text-lg font-semibold">¿Qué es esta página?</h4>
                </div>
                <div class="px-4 py-4">
                    <p class="text-gray-700">Esta plataforma está dedicada a todos los fanáticos de la música en La Paz, Bolivia. Aquí podrás
                        descubrir los conciertos más esperados, comprar entradas según el sector de tu preferencia, hacer
                        reservas anticipadas y mantenerte al tanto de las novedades de cada evento.</p>
                </div>
            </div>

            <!-- Sectores -->
            <div class="border border-gray-300 rounded mb-6">
                <div class="bg-gray-100 px-4 py-3 border-b border-gray-300 rounded-t">
                    <h4 class="text-lg font-semibold">🎟️ Sectores Disponibles</h4>
                </div>
                <div class="px-4 py-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="border border-green-500 rounded shadow">
                            <div class="bg-green-500 text-white px-4 py-2 font-bold rounded-t">VIP</div>
                            <div class="px-4 py-3">
                                <p>Asientos exclusivos cerca del escenario. Incluye acceso
                                    preferencial y bebida gratis.</p>
                            </div>
                        </div>
                        <div class="border border-yellow-400 rounded shadow">
                            <div class="bg-yellow-400 text-black px-4 py-2 font-bold rounded-t">GOLD</div>
                            <div class="px-4 py-3">
                                <p>Buena vista al escenario y acceso rápido al recinto.</p>
                            </div>
                        </div>
                        <div class="border border-blue-400 rounded shadow">
                            <div class="bg-blue-400 text-white px-4 py-2 font-bold rounded-t">GENERAL</div>
                            <div class="px-4 py-3">
                                <p>Acceso general al concierto. Zona amplia y cómoda.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Funcionalidades de la página -->
            <div class="border border-gray-300 rounded mb-6">
                <div class="bg-gray-100 px-4 py-3 border-b border-gray-300 rounded-t">
                    <h4 class="text-lg font-semibold">🛠️ ¿Qué puedes hacer en esta página?</h4>
                </div>
                <div class="px-4 py-4">
                    <ul class="list-disc list-inside space-y-2 text-gray-700">
                        <li>📅 <strong>Reservar entradas</strong> para conciertos.</li>
                        <li>💳 <strong>Comprar tickets</strong> por sector (VIP, GOLD, GENERAL).</li>
                        <li>🖨️ <strong>Visualizar y descargar tus tickets</strong> con código QR.</li>
                        <li>🔔 <strong>Recibir notificaciones</strong> sobre nuevos conciertos.</li>
                        <li>👤 <strong>Administrar tu perfil</strong> y tus reservas.</li>
                    </ul>
                </div>
            </div>

            <!-- Normas -->
            <div class="border border-gray-300 rounded mb-6">
                <div class="bg-gray-100 px-4 py-3 border-b border-gray-300 rounded-t">
                    <h4 class="text-lg font-semibold">📌 Normas del Concierto</h4>
                </div>
                <div class="px-4 py-4">
                    <ul class="list-disc list-inside space-y-2 text-gray-700">
                        <li>Se debe portar entrada digital o impresa con QR válido.</li>
                        <li>No se permite el ingreso con objetos punzocortantes o sustancias ilegales.</li>
                        <li>Los menores de edad deben estar acompañados por un adulto.</li>
                        <li>No se permite grabar el concierto profesionalmente sin autorización.</li>
                        <li>Se recomienda llegar con al menos 1 hora de anticipación.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
