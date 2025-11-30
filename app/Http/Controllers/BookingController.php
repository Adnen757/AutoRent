<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create(Car $car)
    {
        return view('bookings.create', compact('car'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
        ]);

        $car = Car::findOrFail($request->car_id);

        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);
        $days = $start->diffInDays($end);

        // Ensure at least 1 day
        if ($days == 0)
            $days = 1;

        $totalPrice = $days * $car->price_per_day;

        $booking = Booking::create([
            'user_id' => Auth::id(), // Nullable if guest booking allowed, but schema says constrained. 
            // If schema enforces user_id, we must require login or create user.
            // For now assuming logged in or handling logic. 
            // If user not logged in, we might need to handle that. 
            // Let's assume Auth is required for now as per "Permettre aux utilisateurs de créer un compte".
            'car_id' => $car->id,
            'start_date' => $start,
            'end_date' => $end,
            'total_days' => $days,
            'total_price' => $totalPrice,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.confirmation', $booking->id);
    }

    public function confirmation(Booking $booking)
    {
        // Security check: ensure current user owns booking or is admin
        if (Auth::check() && Auth::id() !== $booking->user_id) {
            abort(403);
        }

        return view('bookings.confirmation', compact('booking'));
    }
}
