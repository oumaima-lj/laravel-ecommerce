<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | MyApp</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    @stack('styles')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    </head>
<body class="font-sans antialiased">
    @include('components.navbar')
    <main>
                        @yield('content')
    </main>
    <footer class="text-center py-4 text-muted">
        &copy; {{ date('Y') }} MyApp. All rights reserved.
    </footer>
    <!-- footer, scripts, etc. -->
         <!-- Footer -->
         <footer class="bg-black text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <!-- Left Column: Visit, Contact, Socials -->
                <div>
                    <div class="mb-8">
                        <h3 class="text-xl font-bold mb-2">Come Visit</h3>
                        <p class="text-gray-300 leading-relaxed">The Castle Unit 345 2500 Castle Dr<br>Manhattan, NY</p>
                                </div>
                    <div class="mb-8">
                        <h3 class="text-xl font-bold mb-2">Contact Us</h3>
                        <p class="text-gray-300">+216 (0)40 3629 4753<br>hello@themenectar.com</p>
                                        </div>
                    <div class="flex space-x-6 mt-8">
                        <a href="#" class="text-gray-300 hover:text-white font-semibold underline">Instagram</a>
                        <a href="#" class="text-gray-300 hover:text-white font-semibold underline">FaceBook</a>
                        <a href="#" class="text-gray-300 hover:text-white font-semibold underline">Twitter</a>
                        <a href="#" class="text-gray-300 hover:text-white font-semibold underline">YouTube</a>
                                        </div>
                                    </div>
                <!-- Right Column: Newsletter -->
                <div class="flex items-center justify-center md:justify-end h-full">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-white text-center md:text-right">Stay in the loop with our<br>weekly newsletter</h2>
                        </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar with Marquee -->
        <div class="bg-black border-t border-gray-800 overflow-hidden">
            <div class="whitespace-nowrap animate-marquee py-6">
                <span id="marquee-text" class="marquee-text-custom">ON SALE NOW!</span>
            </div>
        </div>
    </footer>

    @stack('scripts')


    </body>
</html>
