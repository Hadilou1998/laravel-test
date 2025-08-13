<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Mes réservations
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                @if ($bookings->count())
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                    Nom de la propriété
                                </th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                    Date de début
                                </th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                    Date de fin
                                </th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-0">
                                        {{ $booking->property->name }}
                                    </td>
                                    <td class="py-4 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-0">
                                        {{ \Carbon\Carbon::parse($booking->start_date)->format('d/m/Y') }}
                                    </td>
                                    <td class="py-4 pl-4 pr-3 text-sm text-right text-gray-500 whitespace-nowrap sm:pl-0">
                                        {{ \Carbon\Carbon::parse($booking->end_date)->format('d/m/Y') }}
                                    </td>
                                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-500 whitespace-nowrap sm:pl-0">
                                        <a href="{{ route('bookings.show', $booking) }}" class="text-indigo-500 hover:text-indigo-700">Voir</a>
                                        <span class="mx-2 text-gray-500">|</span>
                                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation?')" class="text-red-500 hover:text-red-700">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $bookings->links() }}
                    </div>
                @else
                    <div class="py-12 text-center text-gray-500">
                        Aucune réservation n'a été trouvée.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>