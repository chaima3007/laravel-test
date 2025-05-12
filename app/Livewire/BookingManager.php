<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Property;

class BookingManager extends Component
{
    public $property_id;
    public $start_date;
    public $end_date;

    protected $rules = [
        'property_id' => 'required|exists:properties,id',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
    ];

    public function reserve()
    {
        $this->validate();

        Booking::create([
            'user_id' => auth()->id(),
            'property_id' => $this->property_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        session()->flash('message', 'Réservation effectuée avec succès !');
    }

    public function render()
    {
        $properties = Property::all();
        return view('livewire.booking-manager', compact('properties'));
    }
}
