@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="md:flex">
                    <!-- Image Section -->
                    <div class="md:w-1/2">
                        <img class="w-full h-full object-cover"
                            src="{{ $car->image ?? 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=800&q=80' }}"
                            alt="{{ $car->brand }} {{ $car->model }}">
                    </div>

                    <!-- Details Section -->
                    <div class="p-8 md:w-1/2 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <h1 class="text-3xl font-bold text-gray-900">{{ $car->brand }} {{ $car->model }}</h1>
                                    <p class="text-gray-500 text-lg">{{ $car->year }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-3xl font-bold text-primary">{{ $car->price_per_day }}€</p>
                                    <p class="text-gray-500 text-sm">par jour</p>
                                </div>
                            </div>

                            <div class="mt-8 grid grid-cols-2 gap-6">
                                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                    <span class="text-2xl mr-4">⛽</span>
                                    <div>
                                        <p class="text-sm text-gray-500">Carburant</p>
                                        <p class="font-bold">{{ ucfirst($car->fuel_type) }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                    <span class="text-2xl mr-4">⚙️</span>
                                    <div>
                                        <p class="text-sm text-gray-500">Transmission</p>
                                        <p class="font-bold">{{ ucfirst($car->transmission) }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                    <span class="text-2xl mr-4">💺</span>
                                    <div>
                                        <p class="text-sm text-gray-500">Places</p>
                                        <p class="font-bold">{{ $car->seats }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                    <span class="text-2xl mr-4">✅</span>
                                    <div>
                                        <p class="text-sm text-gray-500">Disponibilité</p>
                                        <p class="font-bold {{ $car->available ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $car->available ? 'Disponible' : 'Indisponible' }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8">
                                <h3 class="text-xl font-bold mb-4">Description</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    {{ $car->description ?? "Aucune description disponible pour ce véhicule. Ce modèle offre confort et performance pour tous vos trajets." }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-8">
                            @if($car->available)
                                <a href="{{ route('bookings.create', $car) }}"
                                    class="block w-full bg-primary text-white text-center font-bold py-4 rounded-lg hover:bg-secondary transition duration-300 shadow-lg transform hover:-translate-y-1">
                                    Réserver ce véhicule
                                </a>
                            @else
                                <button disabled
                                    class="block w-full bg-gray-400 text-white text-center font-bold py-4 rounded-lg cursor-not-allowed">
                                    Actuellement Indisponible
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection