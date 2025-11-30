@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <div class="confirmation-container">
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>

        <h1 class="confirmation-title">Réservation confirmée !</h1>

        <p class="confirmation-text">
            Merci <strong>{{ $booking->customer_name }}</strong> ! Votre demande de réservation a été enregistrée avec
            succès.<br>
            Vous recevrez un email de confirmation à <strong>{{ $booking->customer_email }}</strong>.
        </p>

        <div class="booking-ref">
            Référence: #{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}
        </div>

        <div
            style="background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(0,0,0,0.05); margin-bottom: 2rem; text-align: left; max-width: 500px; margin-left: auto; margin-right: auto;">
            <h2 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 1.5rem; color: #1e293b;">
                <i class="fas fa-file-invoice" style="color: #4f46e5; margin-right: 0.5rem;"></i> Récapitulatif
            </h2>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div>
                    <p
                        style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.25rem; text-transform: uppercase; font-weight: 600;">
                        Véhicule</p>
                    <p style="font-weight: 700; color: #1e293b;">{{ $booking->car->brand }} {{ $booking->car->model }}</p>
                </div>
                <div>
                    <p
                        style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.25rem; text-transform: uppercase; font-weight: 600;">
                        Statut</p>
                    <span
                        style="background: #fef3c7; color: #92400e; padding: 0.25rem 0.75rem; border-radius: 6px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">
                        {{ $booking->status === 'pending' ? 'En attente' : ucfirst($booking->status) }}
                    </span>
                </div>
                <div>
                    <p
                        style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.25rem; text-transform: uppercase; font-weight: 600;">
                        Date de début</p>
                    <p style="font-weight: 700; color: #1e293b;">
                        {{ \Carbon\Carbon::parse($booking->start_date)->format('d/m/Y') }}</p>
                </div>
                <div>
                    <p
                        style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.25rem; text-transform: uppercase; font-weight: 600;">
                        Date de fin</p>
                    <p style="font-weight: 700; color: #1e293b;">
                        {{ \Carbon\Carbon::parse($booking->end_date)->format('d/m/Y') }}</p>
                </div>
                <div>
                    <p
                        style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.25rem; text-transform: uppercase; font-weight: 600;">
                        Durée</p>
                    <p style="font-weight: 700; color: #1e293b;">{{ $booking->total_days }}
                        jour{{ $booking->total_days > 1 ? 's' : '' }}</p>
                </div>
                <div>
                    <p
                        style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.25rem; text-transform: uppercase; font-weight: 600;">
                        Total</p>
                    <p style="font-weight: 700; color: #4f46e5; font-size: 1.25rem;">
                        {{ number_format($booking->total_price, 2) }} €</p>
                </div>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ route('home') }}" class="btn-secondary">
                <i class="fas fa-home"></i> Retour à l'accueil
            </a>
            <a href="{{ route('cars.index') }}" class="submit-btn"
                style="padding: 0.75rem 1.5rem; display: inline-block; text-decoration: none;">
                <i class="fas fa-car"></i> Louer une autre voiture
            </a>
        </div>

        <div
            style="margin-top: 3rem; padding: 1.5rem; background: #f1f5f9; border-radius: 8px; border-left: 4px solid #4f46e5;">
            <p style="margin: 0; color: #475569; font-size: 0.9rem;">
                <i class="fas fa-info-circle" style="color: #4f46e5; margin-right: 0.5rem;"></i>
                Votre réservation sera confirmée par notre équipe dans les plus brefs délais. Vous recevrez une notification
                par email.
            </p>
        </div>
    </div>
@endsection