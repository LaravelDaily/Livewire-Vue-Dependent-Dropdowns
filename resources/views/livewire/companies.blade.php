<form wire:submit.prevent="storeCompany">
    <div class="mt-4">
        <label class="block font-medium text-sm text-gray-700" for="country">
            Country*
        </label>
        <select wire:model="country" name="country"
                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
            <option value="">-- choose country --</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-4">
        <label class="block font-medium text-sm text-gray-700" for="city">
            City*
        </label>

        <select wire:model="city" name="city"
                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
            @if ($cities->count() == 0)
                <option value="">-- choose country first --</option>
            @endif
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
</form>
