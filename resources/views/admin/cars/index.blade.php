@extends('layouts.admin')

@section('title', 'Gestion des Voitures')

@section('content')
    <div class="table-container">
        <div class="table-header">
            <h3 class="table-title">Liste des Voitures</h3>
            <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Ajouter une voiture
            </a>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Marque / Modèle</th>
                    <th>Prix / Jour</th>
                    <th>Caractéristiques</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                    <tr>
                        <td>
                            @if($car->image)
                                <img src="{{ $car->image }}" alt="{{ $car->brand }}"
                                    style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                            @else
                                <div style="width: 60px; height: 40px; background: #e5e7eb; border-radius: 4px;"></div>
                            @endif
                        </td>
                        <td>
                            <div style="font-weight: 600;">{{ $car->brand }} {{ $car->model }}</div>
                            <div style="font-size: 0.75rem; color: #6b7280;">{{ $car->year }}</div>
                        </td>
                        <td>{{ number_format($car->price_per_day, 2) }} €</td>
                        <td>
                            <div style="font-size: 0.75rem; color: #6b7280;">
                                <i class="fas fa-gas-pump"></i> {{ ucfirst($car->fuel_type) }} •
                                <i class="fas fa-cog"></i> {{ ucfirst($car->transmission) }}
                            </div>
                        </td>
                        <td>
                            @if($car->available)
                                <span class="badge badge-success">Disponible</span>
                            @else
                                <span class="badge badge-danger">Indisponible</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex; gap: 0.5rem;">
                                <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-sm btn-primary"
                                    style="background: #3b82f6;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.cars.delete', $car) }}" method="POST"
                                    onsubmit="return confirm('Êtes-vous sûr ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="padding: 1rem;">
            {{ $cars->links() }}
        </div>
    </div>
@endsection