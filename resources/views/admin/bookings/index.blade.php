@extends('layouts.admin')

@section('title', 'Gestion des Réservations')

@section('content')
    <div class="table-container">
        <div class="table-header">
            <h3 class="table-title">Liste des Réservations</h3>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Voiture</th>
                    <th>Dates</th>
                    <th>Prix Total</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>
                            <div style="font-weight: 600;">{{ $booking->user->first_name }} {{ $booking->user->last_name }}
                            </div>
                            <div style="font-size: 0.75rem; color: #6b7280;">{{ $booking->user->email }}</div>
                        </td>
                        <td>{{ $booking->car->brand }} {{ $booking->car->model }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($booking->start_date)->format('d/m/Y') }} -
                            {{ \Carbon\Carbon::parse($booking->end_date)->format('d/m/Y') }}
                        </td>
                        <td>{{ number_format($booking->total_price, 2) }} €</td>
                        <td>
                            @if($booking->status == 'pending')
                                <span class="badge badge-warning">En attente</span>
                            @elseif($booking->status == 'confirmed')
                                <span class="badge badge-success">Confirmée</span>
                            @elseif($booking->status == 'cancelled')
                                <span class="badge badge-danger">Annulée</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex; gap: 0.5rem;">
                                @if($booking->status == 'pending')
                                    <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="confirmed">
                                        <button type="submit" class="btn btn-sm btn-primary" style="background: #10b981;">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="cancelled">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('admin.bookings.delete', $booking) }}" method="POST"
                                    onsubmit="return confirm('Êtes-vous sûr ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" style="background: #ef4444;">
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
            {{ $bookings->links() }}
        </div>
    </div>
@endsection