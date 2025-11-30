<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            [
                'brand' => 'BMW',
                'model' => 'Série 3',
                'year' => 2023,
                'fuel_type' => 'diesel',
                'seats' => 5,
                'transmission' => 'automatic',
                'price_per_day' => 85.00,
                'image' => 'https://images.unsplash.com/photo-1555215695-3004980adade?auto=format&fit=crop&w=800&q=80',
                'description' => 'Une berline élégante et performante, idéale pour les longs trajets.',
                'available' => true,
            ],
            [
                'brand' => 'Audi',
                'model' => 'A1',
                'year' => 2022,
                'fuel_type' => 'essence',
                'seats' => 4,
                'transmission' => 'manual',
                'price_per_day' => 45.00,
                'image' => 'https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?auto=format&fit=crop&w=800&q=80',
                'description' => 'Citadine compacte et dynamique, parfaite pour la ville.',
                'available' => true,
            ],
            [
                'brand' => 'Mercedes',
                'model' => 'Classe C',
                'year' => 2023,
                'fuel_type' => 'hybrid',
                'seats' => 5,
                'transmission' => 'automatic',
                'price_per_day' => 95.00,
                'image' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?auto=format&fit=crop&w=800&q=80',
                'description' => 'Le confort absolu avec une technologie hybride de pointe.',
                'available' => true,
            ],
            [
                'brand' => 'Tesla',
                'model' => 'Model 3',
                'year' => 2024,
                'fuel_type' => 'electric',
                'seats' => 5,
                'transmission' => 'automatic',
                'price_per_day' => 110.00,
                'image' => 'https://images.unsplash.com/photo-1560958089-b8a1929cea89?auto=format&fit=crop&w=800&q=80',
                'description' => 'Expérience de conduite électrique futuriste et silencieuse.',
                'available' => true,
            ],
            [
                'brand' => 'Peugeot',
                'model' => '3008',
                'year' => 2023,
                'fuel_type' => 'diesel',
                'seats' => 5,
                'transmission' => 'manual',
                'price_per_day' => 70.00,
                'image' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=800&q=80',
                'description' => 'SUV polyvalent offrant espace et confort pour toute la famille.',
                'available' => true,
            ],
            [
                'brand' => 'Fiat',
                'model' => '500',
                'year' => 2021,
                'fuel_type' => 'essence',
                'seats' => 4,
                'transmission' => 'manual',
                'price_per_day' => 35.00,
                'image' => 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?auto=format&fit=crop&w=800&q=80',
                'description' => 'L\'icône italienne, petite, pratique et stylée.',
                'available' => true,
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
