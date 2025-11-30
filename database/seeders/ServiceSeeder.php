<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Assurance Tous Risques',
                'description' => 'Voyagez l\'esprit tranquille avec notre couverture complète incluant vol et dommages.',
                'icon' => '🛡️',
            ],
            [
                'title' => 'Assistance 24/7',
                'description' => 'Une panne ? Un accident ? Notre équipe est disponible à tout moment pour vous aider.',
                'icon' => '📞',
            ],
            [
                'title' => 'Kilométrage Illimité',
                'description' => 'Profitez de la route sans compter les kilomètres (sur véhicules éligibles).',
                'icon' => '🛣️',
            ],
            [
                'title' => 'Livraison à Domicile',
                'description' => 'Nous vous livrons le véhicule où vous le souhaitez (frais supplémentaires).',
                'icon' => '🚚',
            ],
            [
                'title' => 'Siège Enfant',
                'description' => 'La sécurité des plus petits est notre priorité. Sièges disponibles sur demande.',
                'icon' => '👶',
            ],
            [
                'title' => 'GPS Inclus',
                'description' => 'Ne vous perdez jamais grâce à nos systèmes de navigation intégrés.',
                'icon' => '🗺️',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
