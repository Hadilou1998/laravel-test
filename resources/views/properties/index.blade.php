<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Liste des propriétés
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($properties as $property)
            <x-property_card :property="$property">
                <x-button wire:click="book({{ $property->id }})">
                    Réserver
                </x-button>
            </x-property_card>
        @endforeach
    </div>
</x-app-layout>