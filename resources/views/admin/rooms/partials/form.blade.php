<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <x-input-label for="number" value="Room Number" />
        <x-text-input id="number" name="number" type="text" class="mt-1 block w-full" value="{{ old('number', optional($room)->number) }}" required />
        <x-input-error :messages="$errors->get('number')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="type" value="Type" />
        <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" value="{{ old('type', optional($room)->type) }}" />
        <x-input-error :messages="$errors->get('type')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="rate" value="Monthly Rate (₱)" />
        <x-text-input id="rate" name="rate" type="number" step="0.01" min="0" class="mt-1 block w-full" value="{{ old('rate', optional($room)->rate) }}" required />
        <x-input-error :messages="$errors->get('rate')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="capacity" value="Capacity" />
        <x-text-input id="capacity" name="capacity" type="number" min="1" class="mt-1 block w-full" value="{{ old('capacity', optional($room)->capacity, 2) }}" required />
        <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
    </div>
    <div class="sm:col-span-2">
        <x-input-label for="status" value="Status" />
        <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            @php($value = old('status', optional($room)->status ?? 'available'))
            <option value="available" @selected($value==='available')>Available</option>
            <option value="reserved" @selected($value==='reserved')>Reserved</option>
            <option value="occupied" @selected($value==='occupied')>Occupied</option>
            <option value="under_maintenance" @selected($value==='under_maintenance')>Under Maintenance</option>
        </select>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>
</div>
