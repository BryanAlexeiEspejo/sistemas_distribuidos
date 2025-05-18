<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conciertos Live</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        .btn-primary {
            background: linear-gradient(90deg, #1e3a8a, #475569);
            /* azul -> plomo oscuro */
            border: none;
            transition: background-position 0.5s ease-in-out;
            background-size: 200%;
            background-position: left;
        }

        .btn-primary:hover {
            background-position: right;
        }
    </style>
</head>

<body class="antialiased bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-gray-800 shadow fixed w-full top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-white font-bold text-2xl">🎵 Conciertos Live</h1>
            <div class="space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="px-4 py-2 text-white btn-primary rounded-lg">Mi Cuenta</a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 text-white btn-primary rounded-lg">Iniciar Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 text-white btn-primary rounded-lg">Registrarse</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="pt-24 pb-16 text-center bg-cover bg-center bg-no-repeat"
        style="background-image: url('https://images.unsplash.com/photo-1585647345914-d6c6b3a7ba16?auto=format&fit=crop&w=1920&q=80');">
        <div class="bg-gray-900 bg-opacity-70 py-20 px-4">
            <h2 class="text-4xl md:text-5xl text-white font-bold mb-4">¡Tus conciertos favoritos en un solo lugar!</h2>
            <p class="text-lg text-gray-200 mb-6">Compra entradas, descubre eventos y vive la música en vivo como nunca.
            </p>
            <a href="#eventos" class="btn-primary px-6 py-3 text-white rounded-lg text-lg shadow-md">Ver Próximos
                Eventos</a>
        </div>
    </section>

    <!-- Carrusel -->
    <section class="my-16 px-4 md:px-0">
        <div class="container mx-auto">
            <h3 class="text-3xl font-bold text-center text-gray-800 mb-8">Eventos Destacados</h3>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://360radio.com.co/wp-content/uploads/2025/02/concierto-3.webp"
                            class="w-full rounded-lg shadow-md" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://static.vecteezy.com/system/resources/previews/054/961/521/non_2x/energetic-concert-at-a-lively-venue-with-vibrant-lights-and-a-cheering-crowd-enjoying-a-night-of-music-and-entertainment-photo.jpeg"
                            class="w-full rounded-lg shadow-md" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://emprendedores.es/wp-content/uploads/conciertos-1589446877.jpg"
                            class="w-full rounded-lg shadow-md" />
                    </div>
                </div>
                <div class="swiper-pagination mt-3"></div>
            </div>
        </div>
    </section>

    <!-- Sección de eventos -->
    <section id="eventos" class="bg-white py-16 px-4">
        <div class="container mx-auto">
            <h3 class="text-3xl font-bold text-center text-gray-800 mb-10">Próximos Conciertos</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                    <img src="https://images.mnstatic.com/55/71/5571ff88165370982b6a83aa1d5edf46.jpg"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h4 class="text-xl font-semibold mb-2">Coldplay - World Tour</h4>
                        <p class="text-gray-600 mb-4">21 Julio 2025 - Estadio Nacional</p>
                        <a href="#" class="btn-primary px-4 py-2 text-white rounded-lg inline-block">Comprar Boletos</a>
                    </div>
                </div>
                <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                    <img src="https://images.mnstatic.com/55/71/5571ff88165370982b6a83aa1d5edf46.jpg"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h4 class="text-xl font-semibold mb-2">Karol G - Bichota Tour</h4>
                        <p class="text-gray-600 mb-4">2 Agosto 2025 - Arena Bolívar</p>
                        <a href="#" class="btn-primary px-4 py-2 text-white rounded-lg inline-block">Comprar Boletos</a>
                    </div>
                </div>
                <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                    <img src="https://images.mnstatic.com/55/71/5571ff88165370982b6a83aa1d5edf46.jpg"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h4 class="text-xl font-semibold mb-2">Imagine Dragons - Mercury Tour</h4>
                        <p class="text-gray-600 mb-4">15 Septiembre 2025 - Teatro MegaMusic</p>
                        <a href="#" class="btn-primary px-4 py-2 text-white rounded-lg inline-block">Comprar Boletos</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 py-8 mt-16">
        <div class="container mx-auto text-center text-gray-300">
            <p>&copy; 2025 Conciertos Live. Todos los derechos reservados.</p>
            <p class="mt-2">Síguenos en redes sociales</p>
            <div class="flex justify-center mt-4 space-x-4">
                <a href="#" class="text-gray-300 hover:text-white">Facebook</a>
                <a href="#" class="text-gray-300 hover:text-white">Instagram</a>
                <a href="#" class="text-gray-300 hover:text-white">Twitter</a>
            </div>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.mySwiper', {
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
</body>

</html>
