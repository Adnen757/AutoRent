@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="relative h-[90vh] min-h-[700px] flex items-center justify-center text-center text-white overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                alt="Hero Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/90 via-indigo-900/70 to-slate-900/95"></div>

            <!-- Animated Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-primary/20 via-transparent to-primary/20 animate-pulse"
                style="animation-duration: 3s;"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-6xl px-4 mx-auto">
            <div class="mb-8 fade-in">
                <span
                    class="inline-block py-2 px-6 rounded-full bg-gradient-to-r from-primary/30 to-blue-500/30 border border-primary/50 text-white text-sm font-semibold backdrop-blur-md shadow-lg">
                    ✨ L'excellence à chaque kilomètre
                </span>
            </div>

            <h1 class="text-6xl md:text-8xl font-black mb-8 leading-tight tracking-tight slide-up"
                style="animation-delay: 0.2s;">
                Louez la voiture de <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-blue-400 to-cyan-400">vos
                    rêves</span>
            </h1>

            <p class="text-xl md:text-2xl mb-12 text-slate-200 max-w-3xl mx-auto font-light leading-relaxed slide-up"
                style="animation-delay: 0.4s;">
                Une expérience de location <span class="text-primary font-semibold">sans compromis</span>. Des prix
                transparents, un service premium et une flotte d'exception.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-6 slide-up" style="animation-delay: 0.6s;">
                <a href="{{ route('cars.index') }}"
                    class="group bg-gradient-to-r from-primary to-blue-600 hover:from-primary/90 hover:to-blue-700 text-white font-bold py-5 px-10 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:-translate-y-1 shadow-2xl hover:shadow-primary/50 flex items-center justify-center gap-3">
                    <span>Voir les voitures</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
                <a href="{{ route('contact') }}"
                    class="group bg-white/10 hover:bg-white/20 backdrop-blur-lg border-2 border-white/30 hover:border-white/50 text-white font-bold py-5 px-10 rounded-2xl transition-all duration-300 flex items-center justify-center gap-2 shadow-xl">
                    <span>Nous contacter</span>
                </a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>

    <!-- Featured Cars -->
    <div class="py-24 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <span class="text-primary font-bold tracking-wider uppercase text-sm">Notre Flotte</span>
                <h2 class="text-5xl font-black text-slate-900 mt-3 mb-6">Véhicules Populaires</h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-primary to-blue-500 mx-auto rounded-full mb-6"></div>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed">Découvrez notre sélection de véhicules
                    les plus
                    demandés, alliant confort, style et performance.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($featuredCars as $car)
                    <div
                        class="group bg-white rounded-3xl shadow-md hover:shadow-2xl transition-all duration-500 overflow-hidden border border-slate-100 flex flex-col h-full transform hover:-translate-y-2">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ $car->image ?? 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=800&q=80' }}"
                                alt="{{ $car->brand }} {{ $car->model }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                            <!-- Gradient Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>

                            <div
                                class="absolute top-4 right-4 bg-gradient-to-r from-primary to-blue-600 text-white px-5 py-2.5 rounded-2xl text-sm font-bold shadow-lg">
                                {{ $car->price_per_day }}€ <span class="text-white/80 font-normal">/ jour</span>
                            </div>
                        </div>
                        <div class="p-8 flex-grow flex flex-col">
                            <h3 class="text-2xl font-bold text-slate-900 mb-2">{{ $car->brand }} {{ $car->model }}</h3>
                            <p class="text-primary text-sm mb-6 uppercase tracking-wider font-semibold">
                                {{ $car->category ?? 'Premium' }}
                            </p>

                            <div class="grid grid-cols-2 gap-4 mb-8 text-slate-600 text-sm">
                                <div class="flex items-center gap-2 bg-slate-50 px-3 py-2 rounded-lg">
                                    <span class="text-primary text-lg">⛽</span> {{ $car->fuel_type }}
                                </div>
                                <div class="flex items-center gap-2 bg-slate-50 px-3 py-2 rounded-lg">
                                    <span class="text-primary text-lg">⚙️</span> {{ $car->transmission ?? 'Auto' }}
                                </div>
                                <div class="flex items-center gap-2 bg-slate-50 px-3 py-2 rounded-lg">
                                    <span class="text-primary text-lg">💺</span> {{ $car->seats }} places
                                </div>
                                <div class="flex items-center gap-2 bg-slate-50 px-3 py-2 rounded-lg">
                                    <span class="text-primary text-lg">❄️</span> Clim.
                                </div>
                            </div>

                            <div class="mt-auto">
                                <a href="{{ route('cars.show', $car) }}"
                                    class="block w-full text-center bg-gradient-to-r from-slate-900 to-slate-800 hover:from-primary hover:to-blue-600 text-white py-4 rounded-2xl font-bold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                    Réserver maintenant
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20 bg-white rounded-3xl shadow-sm border border-slate-100">
                        <div class="text-6xl mb-4">🚗</div>
                        <h3 class="text-xl font-bold text-slate-900">Aucune voiture disponible</h3>
                        <p class="text-slate-500 mt-2">Revenez bientôt pour découvrir nos nouveaux modèles.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-16">
                <a href="{{ route('cars.index') }}"
                    class="inline-flex items-center text-primary font-bold hover:text-secondary transition group">
                    <span>Voir toute la flotte</span>
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Services Preview -->
    <div class="py-24 bg-white relative overflow-hidden">
        <!-- Decorative elements -->
        <div
            class="absolute top-0 left-0 w-64 h-64 bg-blue-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 -translate-x-1/2 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 right-0 w-64 h-64 bg-amber-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 translate-x-1/2 translate-y-1/2">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <span class="text-primary font-bold tracking-wider uppercase text-sm">Pourquoi nous choisir</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-2 mb-4">Nos Services Premium</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Nous ne nous contentons pas de louer des voitures, nous
                    vous offrons une expérience complète.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div
                    class="bg-slate-50 p-10 rounded-3xl hover:bg-white hover:shadow-xl transition-all duration-300 group border border-transparent hover:border-slate-100">
                    <div
                        class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform duration-300 text-primary">
                        🚗
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Large Flotte Premium</h3>
                    <p class="text-slate-600 leading-relaxed">Des citadines agiles aux SUVs spacieux, en passant par les
                        berlines de luxe. Nous avons le véhicule parfait pour chaque occasion.</p>
                </div>
                <div
                    class="bg-slate-50 p-10 rounded-3xl hover:bg-white hover:shadow-xl transition-all duration-300 group border border-transparent hover:border-slate-100">
                    <div
                        class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform duration-300 text-amber-600">
                        🛡️
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Assurance Complète</h3>
                    <p class="text-slate-600 leading-relaxed">Roulez l'esprit tranquille. Notre couverture tous risques
                        incluse vous protège, vous et vos passagers, en toutes circonstances.</p>
                </div>
                <div
                    class="bg-slate-50 p-10 rounded-3xl hover:bg-white hover:shadow-xl transition-all duration-300 group border border-transparent hover:border-slate-100">
                    <div
                        class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform duration-300 text-green-600">
                        🎧
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Support 24/7</h3>
                    <p class="text-slate-600 leading-relaxed">Une question ? Un imprévu ? Notre équipe dédiée est disponible
                        à tout moment pour vous assister, où que vous soyez.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-20 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]">
        </div>
        <div class="max-w-5xl mx-auto px-4 text-center relative z-10">
            <h2 class="text-4xl font-bold mb-6">Prêt à prendre la route ?</h2>
            <p class="text-xl text-slate-300 mb-10 max-w-2xl mx-auto">Réservez votre véhicule dès aujourd'hui et profitez de
                nos offres exclusives.</p>
            <a href="{{ route('cars.index') }}"
                class="inline-block bg-primary hover:bg-blue-600 text-white font-bold py-4 px-10 rounded-full transition-all duration-300 shadow-lg hover:shadow-blue-500/50 transform hover:-translate-y-1">
                Réserver une voiture
            </a>
        </div>
    </div>
@endsection