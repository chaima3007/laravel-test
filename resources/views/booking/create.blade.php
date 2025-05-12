@extends('layouts.app')

@section('title', 'Réserver ' . $property->name)

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-4">Réserver : {{ $property->name }}</h2>

    <form action="{{ route('booking.store', $property->id) }}" method="POST" id="booking-form" class="space-y-4">
        @csrf

        {{-- Sélection des dates --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Dates</label>
            <input type="text" id="date-range" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Choisir les dates" required>
            <input type="hidden" name="start_date" id="start_date">
            <input type="hidden" name="end_date" id="end_date">
        </div>

        {{-- Affichage du prix total --}}
        <div id="price-display" class="text-lg font-semibold">
            Prix total : 0 €
        </div>

        {{-- Bouton de réservation --}}
        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700">
            Réserver
        </button>
    </form>

    {{-- Affichage des erreurs --}}
    @if($errors->any())
        <div class="mt-4 text-red-600">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/fr.js"></script>
<script>
    flatpickr.localize(flatpickr.l10ns.fr);

    const disabledDates = {!! json_encode($disabledDates) !!};
    const pricePerNight = {{ $property->price_per_night }};
    flatpickr("#date-range", {
        mode: "range",
        minDate: "today",
        dateFormat: "Y-m-d",
        disable: disabledDates,
        defaultDate: [new Date().toISOString().slice(0,10)],
        onChange: function(selectedDates) {
            if (selectedDates.length === 2) {
                const start = selectedDates[0];
                const end = selectedDates[1];
                const nights = Math.ceil((end - start) / (1000 * 60 * 60 * 24));

                const total = nights * pricePerNight;

                document.getElementById("start_date").value = start.toISOString().slice(0,10);
                document.getElementById("end_date").value = end.toISOString().slice(0,10);
                document.getElementById("price-display").textContent = `Prix total : ${total} € pour ${nights} nuit(s)`;
            } else {
                document.getElementById("price-display").textContent = "Prix total : 0 €";
            }
        }
    });

</script>
@endpush
