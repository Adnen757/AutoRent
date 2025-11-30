<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        // Filters
        if ($request->filled('brand')) {
            $query->where('brand', 'like', '%' . $request->brand . '%');
        }
        if ($request->filled('type')) {
            // Assuming 'type' maps to a category or body type if added, 
            // or maybe fuel_type for now if that's what user meant by 'type'
            // Let's assume generic search on model or description for now if 'type' isn't a column
            // Or if 'fuel_type' is what they meant:
            $query->where('fuel_type', $request->type);
        }
        if ($request->filled('min_price')) {
            $query->where('price_per_day', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price_per_day', '<=', $request->max_price);
        }
        if ($request->filled('seats')) {
            $query->where('seats', '>=', $request->seats);
        }

        $cars = $query->where('available', true)->paginate(9);

        return view('cars.index', compact('cars'));
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }
}
