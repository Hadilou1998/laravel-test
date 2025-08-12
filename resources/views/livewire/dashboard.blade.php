<div>
    <h2 class="mb-6 text-xl font-semibold leading-tight text-gray-800">
        Tableau de bord - Propriétés disponibles
    </h2>

    @if($properties->count())
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($properties as $property)
                <x-card-property :property="$property" />
            @endforeach
        </div>
    @else
        <div class="p-6 text-center bg-white rounded-lg shadow-lg">
            <p class="text-gray-600">Aucune propriété disponible.</p>
        </div>
    @endif
</div>