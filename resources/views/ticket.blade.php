@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Encabezado -->
        <div
            class="bg-gradient-to-r from-indigo-600 to-purple-700 border-4 border-indigo-800 shadow-2xl rounded-xl p-6 mb-10 text-center text-white">
            <h2 class="text-5xl font-extrabold drop-shadow-lg flex justify-center items-center gap-3">
                <span>🎤</span> Rick Springfield - Gira "QUIERO MIS 800s"
            </h2>
            <p class="text-xl mt-2">📍 Allianz Amphitheater, Richmond, VA</p>
            <p class="text-md italic">Inspirado en el Teatro al Aire Libre "Jaime Laredo" 🇧🇴</p>
            <p class="mt-2">🗓️ <strong>Sábado 7 de junio de 2025</strong> - 7:00 PM | 🕐 Puertas abren a las 5:30 PM</p>
        </div>

        <!-- Escenario -->
        <div class="flex justify-center mb-6">
            <div
                class="bg-black text-white text-2xl font-bold py-4 w-[1100px] text-center rounded-b-3xl shadow-[0_5px_30px_rgba(0,0,0,0.8)] tracking-widest border-t-4 border-yellow-300">
                🎶 ESCENARIO
            </div>
        </div>

        <!-- Indicadores -->
        <div class="flex justify-between items-center px-8 mb-4">
            <div class="bg-green-700 px-5 py-2 rounded-full text-white font-bold shadow-md border-2 border-white">⬅️ ENTRADA
            </div>
            <div class="bg-red-700 px-5 py-2 rounded-full text-white font-bold shadow-md border-2 border-white">SALIDA ➡️
            </div>
        </div>

        <!-- Zonas -->
        <div id="zonas" class="relative w-full max-w-5xl mx-auto transition-transform duration-700 ease-in-out"
            style="height: 390px;">
            <div id="zona-supervip"
                class="absolute top-0 left-0 right-0 h-40 bg-red-600 rounded-b-full opacity-95 z-10 flex items-center justify-center shadow-2xl zone border-4 border-white hover:scale-105 transition-all">
                <span class="text-white font-extrabold text-2xl drop-shadow-sm">💎 SUPER VIP - Bs. 300</span>
            </div>
            <div id="zona-vip"
                class="absolute top-40 left-12 right-12 h-36 bg-blue-600 rounded-b-full opacity-95 z-20 flex items-center justify-center shadow-2xl zone border-4 border-white hover:scale-105 transition-all">
                <span class="text-white font-extrabold text-2xl">🔷 VIP - Bs. 180</span>
            </div>
            <div id="zona-preferencia"
                class="absolute top-80 left-24 right-24 h-32 bg-green-600 rounded-b-full opacity-95 z-30 flex items-center justify-center shadow-2xl zone border-4 border-white hover:scale-105 transition-all">
                <span class="text-white font-extrabold text-2xl">🟢 PREFERENCIAL - Bs. 100</span>
            </div>
            <div id="zona-general"
                class="absolute top-[450px] left-36 right-36 h-28 bg-yellow-400 rounded-b-full z-40 flex items-center justify-center shadow-2xl zone border-4 border-white hover:scale-105 transition-all">
                <span class="text-black font-extrabold text-2xl">🟡 GENERAL - Bs. 50</span>
            </div>
        </div>

        <!-- Botones -->
        <div class="grid grid-cols-4 gap-6 mt-[13rem]">
            <button onclick="loadSeats('supervip')"
                class="bg-red-600 text-white py-3 px-4 rounded-xl font-bold shadow-xl hover:scale-110 transition-all border-2 border-white">🔴
                Super VIP</button>
            <button onclick="loadSeats('vip')"
                class="bg-blue-600 text-white py-3 px-4 rounded-xl font-bold shadow-xl hover:scale-110 transition-all border-2 border-white">🔹
                VIP</button>
            <button onclick="loadSeats('preferencia')"
                class="bg-green-600 text-white py-3 px-4 rounded-xl font-bold shadow-xl hover:scale-110 transition-all border-2 border-white">
         🟢       Preferencial</button>
            <button onclick="loadSeats('general')"
                class="bg-yellow-400 text-black py-3 px-4 rounded-xl font-bold shadow-xl hover:scale-110 transition-all border-2 border-white">🟡
                General</button>
        </div>

        <!-- Mapa visual -->
        <div class="relative w-full max-w-5xl mx-auto mt-10 hidden" id="mapa-zona">
            <div id="zona-color"
                class="rounded-b-full w-full h-[250px] relative shadow-xl border-4 border-white overflow-hidden bg-indigo-600">
                <div id="real-seats-container"
                    class="absolute w-full h-full grid grid-rows-3 place-items-center px-12 py-6 gap-3">
                    <div id="fila-superior" class="flex justify-center gap-4"></div>
                    <div id="fila-media" class="flex justify-center gap-5"></div>
                    <div id="fila-inferior" class="flex justify-center gap-6"></div>
                </div>
            </div>
        </div>

        <!-- Total -->
        <div class="flex flex-col items-center mt-6 space-y-4">
            <div class="flex space-x-4 items-center">
                <label for="ticket-count" class="text-lg font-semibold">🎫 Entradas:</label>
                <select id="ticket-count" class="border-2 border-indigo-600 p-2 rounded-lg font-bold shadow-md">
                    @for($i = 1; $i <= 8; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <button onclick="confirmPurchase()"
                    class="bg-green-600 text-white px-4 py-2 rounded-lg shadow-xl hover:bg-green-700 font-semibold hover:scale-105 border-2 border-white">✔️
                    Siguiente</button>
            </div>
            <div id="total-price"
                class="text-2xl font-extrabold text-indigo-800 hidden bg-white px-6 py-3 rounded-lg shadow-lg border-2 border-indigo-500">
                Total: Bs. 0</div>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="purchaseModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-4 border-indigo-600 rounded-xl shadow-2xl">
                <div class="modal-header bg-indigo-600 text-white">
                    <h5 class="modal-title">🎟️ Confirmación de Compra - Código QR</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center p-6">
                    <p class="text-lg mb-4">Gracias por tu compra. Escanea el código QR:</p>
                    <img src="{{ asset('images/qr.png') }}" alt="QR"
                        class="mx-auto my-3 border-4 border-gray-300 rounded-xl shadow-md" width="250">
                    <p class="mt-3 text-gray-600">Inspirado en el Teatro al Aire Libre "Jaime Laredo" 🇧🇴</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="limitModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-red-100 border-4 border-red-500 rounded-xl shadow-xl">
                <div class="modal-header bg-red-600 text-white rounded-t-xl">
                    <h5 class="modal-title font-bold">⛔️ Límite de Entradas Excedido</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-5">
                    <p class="text-lg text-red-800 font-semibold">El máximo permitido es de 8 asientos.</p>
                    <button type="button"
                        class="mt-4 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow"
                        data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        const allSeats = {
            supervip: Array.from({ length: 18 }, (_, i) => ({ name: `SV${i + 1}`, price: 300 })),
            vip: Array.from({ length: 18 }, (_, i) => ({ name: `V${i + 1}`, price: 180 })),
            preferencia: Array.from({ length: 18 }, (_, i) => ({ name: `P${i + 1}`, price: 100 })),
            general: Array.from({ length: 18 }, (_, i) => ({ name: `G${i + 1}`, price: 50 }))
        };

        const zoneColors = {
            supervip: 'bg-red-600 border-red-700',
            vip: 'bg-blue-600 border-blue-700',
            preferencia: 'bg-green-600 border-green-700',
            general: 'bg-yellow-400 border-yellow-500'
        };

        const unavailable = ['SV3', 'V2', 'P1', 'G4'];
        let selectedZone = null;

        function loadSeats(zone) {
            selectedZone = zone;
            document.getElementById('total-price').classList.add('hidden');

            document.querySelectorAll('.zone').forEach(z => {
                z.classList.remove('scale-110', 'ring-4', 'ring-white', 'z-50');
            });

            const zoneDiv = document.getElementById('zona-' + zone);
            if (zoneDiv) {
                zoneDiv.classList.add('scale-110', 'ring-4', 'ring-white', 'z-50');
                zoneDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }

            updateRealMap();
        }

        function updateRealMap() {
            const mapa = document.getElementById('mapa-zona');
            const colorDiv = document.getElementById('zona-color');
            const fila1 = document.getElementById('fila-superior');
            const fila2 = document.getElementById('fila-media');
            const fila3 = document.getElementById('fila-inferior');
            fila1.innerHTML = '';
            fila2.innerHTML = '';
            fila3.innerHTML = '';

            if (selectedZone && allSeats[selectedZone]) {
                mapa.classList.remove('hidden');
                colorDiv.className = `rounded-b-full w-full h-[250px] relative shadow-xl border-2 overflow-hidden ${zoneColors[selectedZone]}`;

                allSeats[selectedZone].forEach((seat, i) => {
                    const div = document.createElement('div');
                    div.className = 'w-10 h-10 bg-indigo-600 rounded-full border-2 border-white shadow-md flex items-center justify-center text-white text-xs font-bold cursor-pointer';
                    div.innerText = seat.name;
                    div.dataset.name = seat.name;
                    div.dataset.price = seat.price;

                    if (unavailable.includes(seat.name)) {
                        div.classList.remove('cursor-pointer');
                        div.classList.add('bg-gray-500', 'cursor-not-allowed');
                    } else {
                        div.addEventListener('click', () => {
                            const selected = div.classList.contains('bg-green-600');
                            const count = document.querySelectorAll('#real-seats-container .bg-green-600').length;
                            if (!selected && count >= 8) {
                                new bootstrap.Modal(document.getElementById('limitModal')).show();
                                return;
                            }
                            div.classList.toggle('bg-green-600');
                            div.classList.toggle('bg-indigo-600');
                            updateTotal();
                        });
                    }

                    if (i < 6) fila1.appendChild(div);
                    else if (i < 12) fila2.appendChild(div);
                    else fila3.appendChild(div);
                });
            } else {
                mapa.classList.add('hidden');
            }
        }

        function updateTotal() {
            const selected = document.querySelectorAll('.bg-green-600[data-price]');
            let total = 0;
            selected.forEach(div => total += parseInt(div.dataset.price));
            const totalDiv = document.getElementById('total-price');
            document.getElementById('ticket-count').value = selected.length;
            if (selected.length > 0) {
                totalDiv.classList.remove('hidden');
                totalDiv.textContent = `Total: Bs. ${total}`;
            } else {
                totalDiv.classList.add('hidden');
            }
        }

        function confirmPurchase() {
            const expected = parseInt(document.getElementById('ticket-count').value);
            const selected = document.querySelectorAll('.bg-green-600[data-price]');
            if (selected.length !== expected) {
                alert(`Debes seleccionar exactamente ${expected} asiento(s).`);
                return;
            }
            new bootstrap.Modal(document.getElementById('purchaseModal')).show();
        }
    </script>
@endsection
