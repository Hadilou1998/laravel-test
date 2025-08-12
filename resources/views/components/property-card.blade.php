@props([
    'title',
    'price',
    'location' => null,
    'image' => null,
    'link' => #,
])

<div class="flex items-center justify-between">
    @if($image)
        <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-20 h-20 rounded-lg">
    @endif

    <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">{{ $title }}</h3>
        @if($location)
            <p class="text-sm text-gray-500">{{ $location }}</p>
        @endif
        <p class="mt-2 font-bold text-blue-600">{{ number_format($price, 0, ',', ' ') }} €</p>

        <div class="mt-4">
            <x-button :href="$link" variant="primary" size="md">Voir la fiche</x-button>
        </div>
    </div>
</div>