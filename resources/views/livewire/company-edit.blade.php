<div class="p-6 text-2xl text-red-500">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <!-- Success Alert -->
        @if ($savedName != '')
            <div class="mb-4 p-4 text-green-700 bg-green-100 border border-green-400 rounded">
                Company "{{ $savedName }}" saved successfully
            </div>
        @endif

        <!-- Form -->
        <form wire:submit="save">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Company name</label>
                <input wire:model="name" type="text" required id="name" class="w-full p-2 mt-1 border rounded border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="country" class="block text-gray-700">Country</label>
                <select wire:model.live="country" required id="country" class="w-full p-2 mt-1 border rounded border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- choose country --</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('country')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="city" class="block text-gray-700">City</label>
                <select wire:model="city" required id="city" class="w-full p-2 mt-1 border rounded border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @forelse($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @empty
                        <option value="">-- choose country first --</option>
                    @endforelse
                </select>
                @error('city')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="w-full p-2 text-white bg-blue-500 rounded hover:bg-blue-600">Submit</button>
        </form>
    </div>
</div>
