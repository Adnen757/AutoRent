<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - AutoRent</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                    <i class="fas fa-car-side"></i>
                    <span>AutoRent</span> Admin
                </a>
            </div>

            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i> Dashboard
                </a>

                <a href="{{ route('admin.cars') }}"
                    class="nav-item {{ request()->routeIs('admin.cars*') ? 'active' : '' }}">
                    <i class="fas fa-car"></i> Voitures
                </a>

                <a href="{{ route('admin.bookings') }}"
                    class="nav-item {{ request()->routeIs('admin.bookings*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i> Réservations
                </a>

                <a href="{{ route('admin.clients') }}"
                    class="nav-item {{ request()->routeIs('admin.clients*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Clients
                </a>

                <a href="{{ route('admin.contacts') }}"
                    class="nav-item {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i> Messages
                </a>

                <a href="{{ route('admin.statistics') }}"
                    class="nav-item {{ request()->routeIs('admin.statistics') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie"></i> Statistiques
                </a>

                <a href="{{ route('admin.profile') }}"
                    class="nav-item {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                    <i class="fas fa-user-cog"></i> Profil
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="admin-main">
            <!-- Header -->
            <header class="admin-header">
                <div class="header-title">
                    @yield('title', 'Dashboard')
                </div>

                <div class="header-profile">
                    <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                    <div class="admin-avatar">
                        {{ substr(Auth::user()->first_name, 0, 1) }}{{ substr(Auth::user()->last_name, 0, 1) }}
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </header>

            <!-- Content -->
            <div class="admin-content">
                @if(session('success'))
                    <div
                        style="background: #dcfce7; color: #166534; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>