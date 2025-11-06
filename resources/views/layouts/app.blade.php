<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Reino alfajor')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hero-pattern {
            background-color: #eddcffff;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23D2691E' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-amber-50">
    <nav class="bg-amber-900 text-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="{{ route('inicio') }}" class="text-2xl font-bold">Reino alfajor</a>
                
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('inicio') }}" class="hover:text-amber-200 transition">Inicio</a>
                    <a href="{{ route('fabrica') }}" class="hover:text-amber-200 transition">Fábrica</a>
                    <a href="{{ route('catalogo') }}" class="hover:text-amber-200 transition">Catálogo</a>
                    <a href="{{ route('pedidos') }}" class="hover:text-amber-200 transition">Pedidos</a>
                    <a href="{{ route('carrito.index') }}" class="hover:text-amber-200 transition">Carrito</a>
                    @if(session('authenticated'))
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="hover:text-amber-200 transition">Cerrar Sesión</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-amber-200 transition">Login</a>
                    @endif
                </div>

                <button id="mobile-menu-btn" class="md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <a href="{{ route('inicio') }}" class="block py-2 hover:text-amber-200">Inicio</a>
                <a href="{{ route('fabrica') }}" class="block py-2 hover:text-amber-200">Fábrica</a>
                <a href="{{ route('catalogo') }}" class="block py-2 hover:text-amber-200">Catálogo</a>
                <a href="{{ route('pedidos') }}" class="block py-2 hover:text-amber-200">Pedidos</a>
                <a href="{{ route('carrito.index') }}" class="block py-2 hover:text-amber-200">Carrito</a>
                @if(session('authenticated'))
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block py-2 hover:text-amber-200 w-full text-left">Cerrar Sesión</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block py-2 hover:text-amber-200">Login</a>
                @endif
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mx-4 mt-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mx-4 mt-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer class="bg-amber-900 text-white mt-16">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Reino alfajor</h3>
                    <p class="text-amber-200">Tradición y sabor en cada bocado</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Contacto</h4>
                    <p>Email: </p>
                    <p>Tel: </p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Horarios</h4>
                    <p>Lunes a Viernes: 9:00 - 18:00</p>
                </div>
            </div>
            <div class="text-center mt-8 pt-8 border-t border-amber-700">
                <p>&copy; 2025 Reino alfajor. Victoria Ojeda.</p>
            </div>
        </div>
    </footer>

    <script>
        // Toggle mobile menu
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>