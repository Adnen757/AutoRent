<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Adnen',
            'last_name' => 'Hajlaoui',
            'email' => 'adnenhajlaoui2@gmail.com',
            'password' => Hash::make('adnen12345'),
            'is_admin' => true,
        ]);
    }
}
