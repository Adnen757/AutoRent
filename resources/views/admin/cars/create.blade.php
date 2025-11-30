@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 min-h-screen py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow p-8">
                <h1 class="text-2xl font-bold mb-6">Ajouter une Voiture</h1>

                <form action="{{ route('admin.cars.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold mb-2">Marque</label>
                            <input type="text" name="brand" required class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Modèle</label>
                            <input type="text" name="model" required class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Année</label>
                            <input type="number" name="year" required class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Prix / Jour</label>
                            <input type="number" step="0.01" name="price_per_day" required
                                class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Carburant</label>
                            <select name="fuel_type" class="w-full border rounded px-3 py-2">
                                <option value="essence">Essence</option>
                                <option value="diesel">Diesel</option>
                                <option value="electric">Électrique</option>
                                <option value="hybrid">Hybride</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Transmission</label>
                            <select name="transmission" class="w-full border rounded px-3 py-2">
                                <option value="manual">Manuelle</option>
                                <option value="automatic">Automatique</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Places</label>
                            <input type="number" name="seats" required class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Image URL</label>
                            <input type="url" name="image" class="w-full border rounded px-3 py-2">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-2">Description</label>
                            <textarea name="description" rows="3" class="w-full border rounded px-3 py-2"></textarea>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit"
                            class="bg-primary text-white font-bold py-2 px-4 rounded hover:bg-secondary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection