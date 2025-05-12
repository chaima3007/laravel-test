<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Booking;

class BookingController extends Controller
{
    public function create(Property $property)
{
    return view('booking.create', compact('property'));
}
public function store(Request $request, Property $property)
{
    $request->validate([
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
    ]);

    Booking::create([
        'user_id' => auth()->id(),
        'property_id' => $property->id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
    ]);

    return redirect()->route('properties.show', $property)->with('success', 'Réservation effectuée avec succès.');
}
}
