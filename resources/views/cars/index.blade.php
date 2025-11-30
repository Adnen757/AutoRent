@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="bg-slate-900 py-12 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-secondary/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <h1 class="text-4xl font-bold mb-4">Nos Véhicules</h1>
            <p class="text-slate-300 text-lg">Trouvez la voiture parfaite pour votre prochain voyage.</p>
        </div>
    </div>

    <div class="bg-slate-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- Sidebar Filters -->
                <div class="w-full lg:w-1/4">
                    <div class="bg-white p-6 rounded-2xl shadow-lg sticky top-24 border border-slate-100">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-slate-900">Filtres</h2>
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>

                        <form action="{{ route('cars.index') }}" method="GET" class="space-y-6">
                            <!-- Brand -->
                            <div>
                                <label class="block text-slate-700 text-sm font-semibold mb-2">Marque</label>
                                <input type="text" name="brand" value="{{ request('brand') }}"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 text-slate-700 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                    placeholder="Ex: BMW, Audi...">
                            </div>

                            <!-- Fuel Type -->
                            <div>
                                <label class="block text-slate-700 text-sm font-semibold mb-2">Carburant</label>
                                <select name="type"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 text-slate-700 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all appearance-none">
                                    <option value="">Tous les carburants</option>
                                    <option value="essence" {{ request('type') == 'essence' ? 'selected' : '' }}>Essence
                                    </option>
                                    <option value="diesel" {{ request('type') == 'diesel' ? 'selected' : '' }}>Diesel</option>
                                    <option value="electric" {{ request('type') == 'electric' ? 'selected' : '' }}>Électrique
                                    </option>
                                    <option value="hybrid" {{ request('type') == 'hybrid' ? 'selected' : '' }}>Hybride
                                    </option>
                                </select>
                            </div>

                            <!-- Seats -->
                            <div>
                                <label class="block text-slate-700 text-sm font-semibold mb-2">Places Min.</label>
                                <div class="relative">
                                    <input type="number" name="seats" value="{{ request('seats') }}" min="1" max="9"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 text-slate-700 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                        placeholder="Ex: 4">
                                </div>
                            </div>

                            <!-- Price Range -->
                            <div>
                                <label class="block text-slate-700 text-sm font-semibold mb-2">Prix Max / Jour</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-2.5 text-slate-400">€</span>
                                    <input type="number" name="max_price" value="{{ request('max_price') }}"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-lg pl-8 pr-4 py-2.5 text-slate-700 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                        placeholder="100">
                                </div>
                            </div>

                            <div class="pt-4 space-y-3">
                                <button type="submit"
                                    class="w-full bg-primary hover:bg-secondary text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg">
                                    Appliquer les filtres
                                </button>
                                <a href="{{ route('cars.index') }}"
                                    class="block w-full text-center py-2 text-sm text-slate-500 hover:text-primary transition-colors">
                                    Réinitialiser
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Car Grid -->
                <div class="w-full lg:w-3/4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @forelse($cars as $car)
                            <div
                                class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-slate-100 flex flex-col h-full">
                                <div class="relative h-56 overflow-hidden">
                                    <img src="{{ $car->image ?? 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=800&q=80' }}"
                                        alt="{{ $car->brand }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                    <div
                                        class="absolute top-4 right-4 bg-white/90 backdrop-blur text-slate-900 px-3 py-1.5 rounded-lg text-sm font-bold shadow-sm">
                                        {{ $car->price_per_day }}€ <span class="text-slate-500 font-normal">/ jour</span>
                                    </div>
                                    @if($car->is_available ?? true)
                                        <div
                                            class="absolute bottom-4 left-4 bg-green-500/90 backdrop-blur text-white px-3 py-1 rounded-full text-xs font-bold shadow-sm">
                                            Disponible
                                        </div>
                                    @endif
                                </div>
                                <div class="p-6 flex-grow flex flex-col">
                                    <div class="mb-4">
                                        <h3 class="text-xl font-bold text-slate-900">{{ $car->brand }} {{ $car->model }}</h3>
                                        <p class="text-slate-500 text-sm">{{ $car->year }} •
                                            {{ ucfirst($car->category ?? 'Standard') }}</p>
                                    </div>

                                    <div class="grid grid-cols-2 gap-y-3 gap-x-2 mb-6 text-sm text-slate-600">
                                        <div class="flex items-center gap-2">
                                            <span class="text-primary w-5 text-center">⛽</span> {{ ucfirst($car->fuel_type) }}
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="text-primary w-5 text-center">⚙️</span>
                                            {{ ucfirst($car->transmission) }}
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="text-primary w-5 text-center">💺</span> {{ $car->seats }} Places
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="text-primary w-5 text-center">🚪</span> 4 Portes
                                        </div>
                                    </div>

                                    <div class="mt-auto pt-4 border-t border-slate-100">
                                        <a href="{{ route('cars.show', $car) }}"
                                            class="block w-full bg-slate-900 text-white text-center py-3 rounded-xl hover:bg-primary transition-colors duration-300 font-medium">
                                            Voir Détails
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-3 text-center py-20 bg-white rounded-2xl border border-slate-100 shadow-sm">
                                <div class="text-6xl mb-4 opacity-50">🔍</div>
                                <h3 class="text-xl font-bold text-slate-900 mb-2">Aucun résultat</h3>
                                <p class="text-slate-500">Essayez de modifier vos filtres pour trouver plus de véhicules.</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12">
                        {{ $cars->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection