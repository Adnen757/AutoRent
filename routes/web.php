<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');

// Cars
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Bookings (Require Auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/cars/{car}/book', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}/confirmation', [BookingController::class, 'confirmation'])->name('bookings.confirmation');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->middleware([\App\Http\Middleware\IsAdmin::class])->group(function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');

        // Cars
        Route::get('/cars', [App\Http\Controllers\AdminController::class, 'cars'])->name('cars');
        Route::get('/cars/create', [App\Http\Controllers\AdminController::class, 'createCar'])->name('cars.create');
        Route::post('/cars', [App\Http\Controllers\AdminController::class, 'storeCar'])->name('cars.store');
        Route::get('/cars/{car}/edit', [App\Http\Controllers\AdminController::class, 'editCar'])->name('cars.edit');
        Route::put('/cars/{car}', [App\Http\Controllers\AdminController::class, 'updateCar'])->name('cars.update');
        Route::delete('/cars/{car}', [App\Http\Controllers\AdminController::class, 'deleteCar'])->name('cars.delete');

        // Bookings
        Route::get('/bookings', [App\Http\Controllers\AdminController::class, 'bookings'])->name('bookings');
        Route::patch('/bookings/{booking}', [App\Http\Controllers\AdminController::class, 'updateBookingStatus'])->name('bookings.update');
        Route::delete('/bookings/{booking}', [App\Http\Controllers\AdminController::class, 'deleteBooking'])->name('bookings.delete');

        // Clients
        Route::get('/clients', [App\Http\Controllers\AdminController::class, 'clients'])->name('clients');
        Route::get('/clients/create', [App\Http\Controllers\AdminController::class, 'createClient'])->name('clients.create');
        Route::post('/clients', [App\Http\Controllers\AdminController::class, 'storeClient'])->name('clients.store');
        Route::get('/clients/{client}/edit', [App\Http\Controllers\AdminController::class, 'editClient'])->name('clients.edit');
        Route::put('/clients/{client}', [App\Http\Controllers\AdminController::class, 'updateClient'])->name('clients.update');
        Route::delete('/clients/{client}', [App\Http\Controllers\AdminController::class, 'deleteClient'])->name('clients.delete');

        // Contacts
        Route::get('/contacts', [App\Http\Controllers\AdminController::class, 'contacts'])->name('contacts');
        Route::delete('/contacts/{contact}', [App\Http\Controllers\AdminController::class, 'deleteContact'])->name('contacts.delete');

        // Statistics
        Route::get('/statistics', [App\Http\Controllers\AdminController::class, 'statistics'])->name('statistics');

        // Profile
        Route::get('/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('profile');
        Route::put('/profile', [App\Http\Controllers\AdminController::class, 'updateProfile'])->name('profile.update');
    });
});

require __DIR__ . '/auth.php';

