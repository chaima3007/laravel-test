@extends('layouts.app')

@section('title', 'Nos propriétés')

@section('content')
<div class="space-y-12 px-6 py-10 max-w-7xl mx-auto">


    <div class="text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Nos propriétés</h1>
        <p class="mt-3 text-lg text-gray-600">Découvrez notre sélection exclusive de logements de qualité</p>
    </div>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($properties as $property)
        <x-property-card
            :id="$property->id"
            :title="$property->name"
            :description="$property->description"
            :price="$property->price_per_night"
            :image="$property->image"
            class="w-full sm:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)] xl:w-[calc(25%-1.5rem)] max-w-sm"
        />

        @endforeach
    </div>
</div>
@endsection
