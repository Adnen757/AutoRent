<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoRent - Location de Voitures Premium</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS + Main CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        primary: '#4f46e5',
                        secondary: '#1d4ed8',
                        accent: '#f59e0b',
                        dark: '#0f172a',
                    }
                }
            }
        }
    </script>
    <style>
        .hero-bg {
            background-image: linear-gradient(to right bottom, rgba(15, 23, 42, 0.9), rgba(79, 70, 229, 0.5)), url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
        }

        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="font-sans antialiased bg-slate-50 text-slate-800 flex flex-col min-h-screen">

    <!-- Navigation -->
    <nav class="glass shadow-sm sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center gap-2">
                            <span
                                class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                                AutoRent
                            </span>
                        </a>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-12 sm:flex">
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-primary text-slate-900' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            Accueil
                        </a>
                        <a href="{{ route('cars.index') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('cars.*') ? 'border-primary text-slate-900' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            Voitures
                        </a>
                        <a href="{{ route('services') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('services') ? 'border-primary text-slate-900' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            Services
                        </a>
                        <a href="{{ route('about') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('about') ? 'border-primary text-slate-900' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            À propos
                        </a>
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('contact') ? 'border-primary text-slate-900' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            Contact
                        </a>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    @auth
                        <div class="ml-3 relative group">
                            <button class="flex items-center space-x-2 text-slate-700 hover:text-primary transition">
                                <span class="font-medium">{{ Auth::user()->first_name }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div
                                class="absolute right-0 w-48 mt-2 origin-top-right bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform z-50">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Déconnexion</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('login') }}"
                                class="text-slate-600 hover:text-primary font-medium transition">Connexion</a>
                            <a href="{{ route('register') }}"
                                class="bg-primary hover:bg-secondary text-white px-5 py-2.5 rounded-full font-medium shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                                Inscription
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="flex-grow">
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm" role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9  11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg></div>
                        <div>
                            <p class="font-bold">Succès</p>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-slate-300 mt-auto">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="col-span-1 md:col-span-1">
                    <h3 class="text-2xl font-bold text-white mb-6">AutoRent</h3>
                    <p class="text-slate-400 leading-relaxed">
                        Redéfinissez votre expérience de conduite. Des véhicules premium pour tous vos déplacements,
                        avec un service irréprochable.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white mb-6">Navigation</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="hover:text-primary transition duration-300">Accueil</a>
                        </li>
                        <li><a href="{{ route('cars.index') }}" class="hover:text-primary transition duration-300">Nos
                                Voitures</a></li>
                        <li><a href="{{ route('services') }}"
                                class="hover:text-primary transition duration-300">Services</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-primary transition duration-300">À
                                propos</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white mb-6">Support</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('contact') }}"
                                class="hover:text-primary transition duration-300">Contactez-nous</a></li>
                        <li><a href="#" class="hover:text-primary transition duration-300">FAQ</a></li>
                        <li><a href="#" class="hover:text-primary transition duration-300">Conditions Générales</a></li>
                        <li><a href="#" class="hover:text-primary transition duration-300">Politique de
                                Confidentialité</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white mb-6">Contact</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <span class="text-primary mr-3 mt-1">📍</span>
                            <span>123 Avenue des Champs-Élysées<br>75008 Paris, France</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-primary mr-3">📞</span>
                            <span>+33 1 23 45 67 89</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-primary mr-3">✉️</span>
                            <span>contact@autorent.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-16 border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p>&copy; {{ date('Y') }} AutoRent. Tous droits réservés.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-slate-400 hover:text-white transition"><span
                            class="sr-only">Facebook</span>FB</a>
                    <a href="#" class="text-slate-400 hover:text-white transition"><span
                            class="sr-only">Twitter</span>TW</a>
                    <a href="#" class="text-slate-400 hover:text-white transition"><span
                            class="sr-only">Instagram</span>IG</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>