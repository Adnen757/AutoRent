<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalCars = Car::count();
        $totalBookings = Booking::count();
        $totalClients = User::where('is_admin', false)->count();
        $revenue = Booking::where('status', 'confirmed')->sum(DB::raw('total_price'));
        $pendingBookings = Booking::where('status', 'pending')->count();
        $recentBookings = Booking::with('car', 'user')->latest()->take(5)->get();

        // Monthly bookings for chart (last 6 months)
        $monthlyBookings = Booking::select(
            DB::raw('COUNT(*) as count'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Most rented cars
        $mostRentedCars = Car::withCount('bookings')
            ->orderBy('bookings_count', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalCars',
            'totalBookings',
            'totalClients',
            'revenue',
            'pendingBookings',
            'recentBookings',
            'monthlyBookings',
            'mostRentedCars'
        ));
    }

    // ========== CARS MANAGEMENT ==========
    public function cars()
    {
        $cars = Car::paginate(10);
        return view('admin.cars.index', compact('cars'));
    }

    public function createCar()
    {
        return view('admin.cars.create');
    }

    public function storeCar(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'price_per_day' => 'required|numeric',
            'seats' => 'required|integer',
            'fuel_type' => 'required',
            'transmission' => 'required',
        ]);

        Car::create($request->all());

        return redirect()->route('admin.cars')->with('success', 'Voiture ajoutée avec succès');
    }

    public function editCar(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function updateCar(Request $request, Car $car)
    {
        $car->update($request->all());
        return redirect()->route('admin.cars')->with('success', 'Voiture mise à jour');
    }

    public function deleteCar(Car $car)
    {
        $car->delete();
        return back()->with('success', 'Voiture supprimée');
    }

    // ========== BOOKINGS MANAGEMENT ==========
    public function bookings()
    {
        $bookings = Booking::with('car', 'user')->latest()->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateBookingStatus(Request $request, Booking $booking)
    {
        $booking->update(['status' => $request->status]);
        return back()->with('success', 'Statut de la réservation mis à jour');
    }

    public function deleteBooking(Booking $booking)
    {
        $booking->delete();
        return back()->with('success', 'Réservation supprimée');
    }

    // ========== CLIENTS MANAGEMENT ==========
    public function clients()
    {
        $clients = User::where('is_admin', false)->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    public function createClient()
    {
        return view('admin.clients.create');
    }

    public function storeClient(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false,
        ]);

        return redirect()->route('admin.clients')->with('success', 'Client ajouté avec succès');
    }

    public function editClient(User $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function updateClient(Request $request, User $client)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $client->id,
        ]);

        $data = $request->only(['first_name', 'last_name', 'email']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $client->update($data);
        return redirect()->route('admin.clients')->with('success', 'Client mis à jour');
    }

    public function deleteClient(User $client)
    {
        $client->delete();
        return back()->with('success', 'Client supprimé');
    }

    // ========== CONTACT MESSAGES MANAGEMENT ==========
    public function contacts()
    {
        $contacts = ContactMessage::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function deleteContact(ContactMessage $contact)
    {
        $contact->delete();
        return back()->with('success', 'Message supprimé');
    }

    // ========== STATISTICS ==========
    public function statistics()
    {
        // Monthly revenue
        $monthlyRevenue = Booking::select(
            DB::raw('SUM(total_price) as revenue'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year')
        )
            ->where('status', 'confirmed')
            ->where('created_at', '>=', now()->subMonths(12))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Bookings by status
        $bookingsByStatus = Booking::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();

        // Most active clients
        // Most active clients
        $topClients = User::where('is_admin', false)
            ->withCount('bookings')
            ->orderBy('bookings_count', 'desc')
            ->take(10)
            ->get();

        return view('admin.statistics', compact('monthlyRevenue', 'bookingsByStatus', 'topClients'));
    }

    // ========== PROFILE / SETTINGS ==========
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $data = $request->only(['first_name', 'last_name', 'email']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        return back()->with('success', 'Profil mis à jour avec succès');
    }
}
