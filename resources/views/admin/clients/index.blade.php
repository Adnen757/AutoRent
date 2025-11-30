@extends('layouts.admin')

@section('title', 'Gestion des Clients')

@section('content')
    <div class="table-container">
        <div class="table-header">
            <h3 class="table-title">Liste des Clients</h3>
            <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Ajouter un client
            </a>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date d'inscription</th>
                    <th>Réservations</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>
                            <div style="font-weight: 600;">{{ $client->first_name }} {{ $client->last_name }}</div>
                        </td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->created_at->format('d/m/Y') }}</td>
                        <td>
                            <span class="badge badge-info">{{ $client->bookings->count() }} réservations</span>
                        </td>
                        <td>
                            <div style="display: flex; gap: 0.5rem;">
                                <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-sm btn-primary"
                                    style="background: #3b82f6;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.clients.delete', $client) }}" method="POST"
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
            {{ $clients->links() }}
        </div>
    </div>
@endsection