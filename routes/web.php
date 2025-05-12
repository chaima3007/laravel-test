<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Property;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    $properties = Property::all();
    return view('home', compact('properties'));
})->name('home');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/booking/{property}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/{property}', [BookingController::class, 'store'])->name('booking.store');

  
});

require __DIR__.'/auth.php';
