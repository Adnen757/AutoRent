@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/booking.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="booking-container">
    <form action="{{ route('bookings.store') }}" method="POST" id="bookingForm">
        @csrf
        <input type="hidden" name="car_id" value="{{ $car->id }}">

        <div class="booking-card">
            <!-- Left Side: Form -->
            <div class="booking-form-section">
                <h1 class="section-title" style="font-size: 1.75rem; margin-bottom: 2rem;">
                    <i class="fas fa-calendar-check"></i> Finaliser la réservation
                </h1>

                @if ($errors->any())
                    <div style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 2rem;">
                        <ul style="list-style: disc; padding-left: 1.5rem;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="section-title">
                    <i class="fas fa-user-circle"></i> Vos Informations
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Nom Complet</label>
                        <input type="text" name="customer_name" class="form-input" 
                            value="{{ old('customer_name', Auth::user()->first_name . ' ' . Auth::user()->last_name) }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="customer_email" class="form-input" 
                            value="{{ old('customer_email', Auth::user()->email) }}" required>
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label class="form-label">Téléphone</label>
                        <input type="tel" name="customer_phone" class="form-input" 
                            value="{{ old('customer_phone') }}" placeholder="+33 6 12 34 56 78" required>
                    </div>
                </div>

                <div class="section-title">
                    <i class="fas fa-clock"></i> Période de location
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Date de début</label>
                        <input type="date" name="start_date" id="start_date" class="form-input" 
                            min="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date de fin</label>
                        <input type="date" name="end_date" id="end_date" class="form-input" 
                            min="{{ date('Y-m-d') }}" required>
                    </div>
                </div>
            </div>

            <!-- Right Side: Summary -->
            <div class="booking-summary-section">
                <div class="car-preview">
                    @if($car->image)
                        <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->brand }}">
                    @else
                        <img src="https://via.placeholder.com/400x200?text={{ $car->brand }}" alt="{{ $car->brand }}">
                    @endif
                    <div class="car-title">{{ $car->brand }} {{ $car->model }}</div>
                    <div class="car-subtitle">{{ $car->year }} • {{ ucfirst($car->transmission) }} • {{ ucfirst($car->fuel_type) }}</div>
                </div>

                <div class="price-details">
                    <div class="price-row">
                        <span class="price-label">Prix par jour</span>
                        <span class="price-value">{{ number_format($car->price_per_day, 2) }} €</span>
                    </div>
                    <div class="price-row">
                        <span class="price-label">Durée</span>
                        <span class="price-value" id="totalDays">0 jours</span>
                    </div>
                    <div class="price-row total">
                        <span class="price-label">Total Estimé</span>
                        <span class="price-value" id="totalPrice">0.00 €</span>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    Confirmer la réservation <i class="fas fa-arrow-right" style="margin-left: 0.5rem;"></i>
                </button>
                
                <p style="text-align: center; margin-top: 1rem; font-size: 0.85rem; color: #64748b;">
                    <i class="fas fa-lock"></i> Paiement sécurisé lors du retrait
                </p>
            </div>
        </div>
    </form>
</div>

<script>
    const pricePerDay = {{ $car->price_per_day }};
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');
    const totalDaysSpan = document.getElementById('totalDays');
    const totalPriceSpan = document.getElementById('totalPrice');

    function calculateTotal() {
        const start = new Date(startDateInput.value);
        const end = new Date(endDateInput.value);

        if (start && end && !isNaN(start) && !isNaN(end)) {
            if (end < start) {
                endDateInput.value = startDateInput.value;
                return calculateTotal();
            }

            const diffTime = Math.abs(end - start);
            let days = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            // If same day or just 1 day difference logic
            if (days === 0) days = 1;

            totalDaysSpan.textContent = days + ' jours';
            totalPriceSpan.textContent = (days * pricePerDay).toFixed(2) + ' €';
        } else {
            totalDaysSpan.textContent = '0 jours';
            totalPriceSpan.textContent = '0.00 €';
        }
    }

    startDateInput.addEventListener('change', function() {
        endDateInput.min = this.value;
        calculateTotal();
    });
    
    endDateInput.addEventListener('change', calculateTotal);
</script>
@endsection