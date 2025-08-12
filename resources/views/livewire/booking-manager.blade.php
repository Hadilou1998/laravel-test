<div class="p-6 bg-white rounded-lg shadow-lg">
    @if(session()->has('message'))
        <div class="p-2 text-white bg-green-500 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Du</label>
            <input type="date" wire:model="start_date" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" />
            @error('start_date')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Au</label>
            <input type="date" wire:model="end_date" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" />
            @error('end_date')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror
        </div>

        @error('overlap') <div class="text-sm text-red-500">{{ $message }}</div> @enderror

        <div class="flex justify-end">
            <button wire:click="book" wire:loading.attr="disabled" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Réserver
            </button>
        </div>
    </div>
</div>