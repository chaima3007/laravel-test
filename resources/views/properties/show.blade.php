@extends('layouts.app')

@section('title', $property->name)

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md p-6">
    <img src="{{ asset('storage/' . $property->image) }}" class="w-full h-80 object-cover rounded-md mb-6" alt="{{ $property->name }}">

    <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $property->name }}</h2>
    <p class="text-gray-600 mb-4">{{ $property->description }}</p>
    <p class="text-indigo-600 text-xl font-semibold mb-4">{{ number_format($property->price_per_night, 0, ',', ' ') }} € / nuit</p>

    
        <a href="{{ route('booking.create', $property->id) }}"
           class="inline-block px-6 py-3 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700">
            Réserver cette propriété
        </a>

</div>
@endsection
