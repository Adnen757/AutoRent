@extends('layouts.admin')

@section('title', 'Statistiques Détaillées')

@section('content')
    <div class="charts-grid">
        <!-- Revenue Chart -->
        <div class="chart-card" style="grid-column: span 2;">
            <div class="chart-header">
                <h3 class="chart-title">Revenus Mensuels (12 derniers mois)</h3>
            </div>
            <canvas id="revenueChart" height="100"></canvas>
        </div>
    </div>

    <div class="charts-grid">
        <!-- Status Chart -->
        <div class="chart-card">
            <div class="chart-header">
                <h3 class="chart-title">Répartition des Réservations</h3>
            </div>
            <canvas id="statusChart"></canvas>
        </div>

        <!-- Top Clients -->
        <div class="table-container" style="margin-bottom: 0;">
            <div class="table-header">
                <h3 class="table-title">Top 10 Clients</h3>
            </div>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Réservations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topClients as $client)
                        <tr>
                            <td>
                                <div style="font-weight: 600;">{{ $client->first_name }} {{ $client->last_name }}</div>
                                <div style="font-size: 0.75rem; color: #6b7280;">{{ $client->email }}</div>
                            </td>
                            <td>
                                <span class="badge badge-info">{{ $client->bookings_count }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($monthlyRevenue->map(fn($r) => $r->month . '/' . $r->year)) !!},
                datasets: [{
                    label: 'Revenus (€)',
                    data: {!! json_encode($monthlyRevenue->pluck('revenue')) !!},
                    backgroundColor: '#10b981',
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Status Chart
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        new Chart(statusCtx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($bookingsByStatus->pluck('status')->map(fn($s) => ucfirst($s))) !!},
                datasets: [{
                    data: {!! json_encode($bookingsByStatus->pluck('count')) !!},
                    backgroundColor: ['#f59e0b', '#10b981', '#ef4444']
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