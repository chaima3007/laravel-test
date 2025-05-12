@extends('layouts.app')

@section('title', 'Nos propriétés')


@section('content')
<div class="space-y-8">
    <div class="bg-red-500 text-white p-4">
    Si tu vois un fond rouge, Tailwind fonctionne
</div>
    <div class="text-center">
        <h1 class="text-3xl font-bold text-gray-900">Nos propriétés</h1>
        <p class="mt-2 text-gray-600">Découvrez notre sélection exclusive</p>
    </div>

    <!-- Solution avec Flexbox -->
    <div class="flex flex-wrap justify-center gap-3 px-4">
        @foreach($properties as $property)
            <x-property-card 
                :id="$property->id"
                :title="$property->name" 
                :description="$property->description" 
                :price="$property->price_per_night" 
                class="w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)] xl:w-[calc(25%-1.5rem)] max-w-sm"
            />
        @endforeach
    </div>
</div>
@endsection