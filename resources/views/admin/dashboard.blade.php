@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <h3>Total Voitures</h3>
                <p class="stat-value">{{ $totalCars }}</p>
            </div>
            <div class="stat-icon icon-blue">
                <i class="fas fa-car"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h3>Réservations</h3>
                <p class="stat-value">{{ $totalBookings }}</p>
            </div>
            <div class="stat-icon icon-purple">
                <i class="fas fa-calendar-check"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h3>Clients</h3>
                <p class="stat-value">{{ $totalClients }}</p>
            </div>
            <div class="stat-icon icon-orange">
                <i class="fas fa-users"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h3>Revenus</h3>
                <p class="stat-value">{{ number_format($revenue, 2) }} €</p>
            </div>
            <div class="stat-icon icon-green">
                <i class="fas fa-euro-sign"></i>
            </div>
        </div>
    </div>

    <!-- Charts Grid -->
    <div class="charts-grid">
        <div class="chart-card">
            <div class="chart-header">
                <h3 class="chart-title">Réservations par mois</h3>
            </div>
            <canvas id="bookingsChart"></canvas>
        </div>

        <div class="chart-card">
            <div class="chart-header">
                <h3 class="chart-title">Voitures les plus louées</h3>
            </div>
            <canvas id="carsChart"></canvas>
        </div>
    </div>

    <!-- Recent Bookings -->
    <div class="table-container">
        <div class="table-header">
            <h3 class="table-title">Réservations Récentes</h3>
            <a href="{{ route('admin.bookings') }}" class="btn btn-sm btn-primary">Voir tout</a>
        </div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Voiture</th>
                    <th>Dates</th>
                    <th>Prix Total</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentBookings as $booking)
                    <tr>
                        <td>
                            <div style="font-weight: 500;">{{ $booking->user->first_name }} {{ $booking->user->last_name }}
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Bookings Chart
        const bookingsCtx = document.getElementById('bookingsChart').getContext('2d');
        new Chart(bookingsCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($monthlyBookings->map(fn($b) => $b->month . '/' . $b->year)) !!},
                datasets: [{
                    label: 'Réservations',
                    data: {!! json_encode($monthlyBookings->pluck('count')) !!},
                    borderColor: '#4f46e5',
                    tension: 0.4,
                    fill: true,
                    backgroundColor: 'rgba(79, 70, 229, 0.1)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 1 } }
                }
            }
        });

        // Cars Chart
        const carsCtx = document.getElementById('carsChart').getContext('2d');
        new Chart(carsCtx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($mostRentedCars->map(fn($c) => $c->brand . ' ' . $c->model)) !!},
                datasets: [{
                    data: {!! json_encode($mostRentedCars->pluck('bookings_count')) !!},
                    backgroundColor: [
                        '#4f46e5', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    </script>
@endsection