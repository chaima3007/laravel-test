@props([
    'type' => 'button',
    'variant' => 'primary',
])

@php
    $base = 'inline-flex items-center justify-center px-4 py-2 border rounded-lg font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2';
    $variants = [
        'primary' => 'bg-primary text-white hover:bg-blue-800 focus:ring-primary',
        'secondary' => 'bg-secondary text-white hover:bg-purple-700 focus:ring-secondary',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-600',
    ];
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => "$base {$variants[$variant]}"]) }}>
    {{ $slot }}
</button>
