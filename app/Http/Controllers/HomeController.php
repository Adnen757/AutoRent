<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // Fetch featured cars (e.g., random 3 or specific ones)
            $featuredCars = Car::where('available', true)->inRandomOrder()->take(3)->get();
            // Fetch services
            $services = Service::all();
        } catch (\Exception $e) {
            // Handle database connection errors gracefully
            $featuredCars = collect([]);
            $services = collect([]);
        }

        return view('home', compact('featuredCars', 'services'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        try {
            $services = Service::all();
        } catch (\Exception $e) {
            $services = collect([]);
        }
        return view('pages.services', compact('services'));
    }
}
