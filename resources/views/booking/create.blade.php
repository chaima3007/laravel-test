@extends('layouts.app')

@section('title', 'Réserver ' . $property->name)

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-4">Réserver : {{ $property->name }}</h2>

    <form action="{{ route('booking.store', $property->id) }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="start_date" class="block text-sm font-medium text-gray-700">Date d'arrivée</label>
            <input type="date" name="start_date" id="start_date" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>

        <div>
            <label for="end_date" class="block text-sm font-medium text-gray-700">Date de départ</label>
            <input type="date" name="end_date" id="end_date" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>

        <button type="submit"
                class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700">
            Réserver
        </button>
    </form>
</div>
@endsection
