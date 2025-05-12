@props(['id', 'title', 'image', 'description', 'price', 'class' => ''])
<div {{ $attributes->merge(['class' => 'w-full group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 ease-in-out transform hover:-translate-y-1 border border-gray-100 flex flex-col h-full']) }}>

<!-- Image de la propriété -->
    <div class="relative overflow-hidden h-60 flex-shrink-0">
     @if ($image)
    <img src="{{ asset('storage/' . $image) }}" alt="{{ $title }}" class="w-full h-48 object-cover rounded-t">
@endif

        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
    </div>

    <div class="p-5 space-y-3 flex flex-col flex-grow">
        <!-- Titre et prix -->
        <div class="flex justify-between items-start">
            <h3 class="text-xl font-bold text-gray-800 truncate">{{ $title }}</h3>
            <p class="text-indigo-600 font-bold whitespace-nowrap">{{ number_format($price, 0, ',', ' ') }} € <span class="text-gray-500 text-sm font-normal">/nuit</span></p>
        </div>

        <!-- Description -->
        <p class="text-gray-500 line-clamp-2 flex-grow">{{ $description }}</p>

        <!-- Bouton de réservation -->
        <div class="pt-2">
            <a href="{{ route('properties.show', $id) }}"
            class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 w-full transition">
                Voir les détails
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>

        </div>
    </div>
</div>