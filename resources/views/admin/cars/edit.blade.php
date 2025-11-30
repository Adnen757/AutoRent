@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 min-h-screen py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow p-8">
                <h1 class="text-2xl font-bold mb-6">Modifier Voiture</h1>

                <form action="{{ route('admin.cars.update', $car) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold mb-2">Marque</label>
                            <input type="text" name="brand" value="{{ $car->brand }}" required
                                class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Modèle</label>
                            <input type="text" name="model" value="{{ $car->model }}" required
                                class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Année</label>
                            <input type="number" name="year" value="{{ $car->year }}" required
                                class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Prix / Jour</label>
                            <input type="number" step="0.01" name="price_per_day" value="{{ $car->price_per_day }}" required
                                class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Carburant</label>
                            <select name="fuel_type" class="w-full border rounded px-3 py-2">
                                <option value="essence" {{ $car->fuel_type == 'essence' ? 'selected' : '' }}>Essence</option>
                                <option value="diesel" {{ $car->fuel_type == 'diesel' ? 'selected' : '' }}>Diesel</option>
                                <option value="electric" {{ $car->fuel_type == 'electric' ? 'selected' : '' }}>Électrique
                                </option>
                                <option value="hybrid" {{ $car->fuel_type == 'hybrid' ? 'selected' : '' }}>Hybride</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Transmission</label>
                            <select name="transmission" class="w-full border rounded px-3 py-2">
                                <option value="manual" {{ $car->transmission == 'manual' ? 'selected' : '' }}>Manuelle
                                </option>
                                <option value="automatic" {{ $car->transmission == 'automatic' ? 'selected' : '' }}>
                                    Automatique</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Places</label>
                            <input type="number" name="seats" value="{{ $car->seats }}" required
                                class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Image URL</label>
                            <input type="url" name="image" value="{{ $car->image }}"
                                class="w-full border rounded px-3 py-2">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-2">Description</label>
                            <textarea name="description" rows="3"
                                class="w-full border rounded px-3 py-2">{{ $car->description }}</textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="available" value="1" {{ $car->available ? 'checked' : '' }}
                                    class="form-checkbox text-primary">
                                <span class="ml-2">Disponible</span>
                            </label>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit"
                            class="bg-primary text-white font-bold py-2 px-4 rounded hover:bg-secondary">Mettre à
                            jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection