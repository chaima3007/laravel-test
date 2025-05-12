<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Booking;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class BookingController extends Controller
{
    public function create(Property $property)
    {
        $bookedDates = Booking::where('property_id', $property->id)
            ->where('end_date', '>', now())
            ->get(['start_date', 'end_date']);

        $disabledDates = [];

        foreach ($bookedDates as $booking) {
            $start = Carbon::parse($booking->start_date);
            $end = Carbon::parse($booking->end_date);
            $period = CarbonPeriod::create($start, $end);

            foreach ($period as $date) {
                $disabledDates[] = $date->format('Y-m-d');
            }
        }

        return view('booking.create', compact('property', 'disabledDates'));
    }

    public function store(Request $request, Property $property)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Vérification des chevauchements
        $overlap = Booking::where('property_id', $property->id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                      ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                      ->orWhere(function ($query) use ($request) {
                          $query->where('start_date', '<=', $request->start_date)
                                ->where('end_date', '>=', $request->end_date);
                      });
            })->exists();

        if ($overlap) {
            return back()->withErrors(['start_date' => 'Ces dates sont déjà réservées.']);
        }

        Booking::create([
            'user_id' => auth()->id(),
            'property_id' => $property->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('properties.show', $property)->with('success', 'Réservation effectuée avec succès.');
    }
}
