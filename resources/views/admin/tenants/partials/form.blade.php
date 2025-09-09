<div class="grid gap-4 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <x-input-label for="user_id" value="Tenant User" />
        <select id="user_id" name="user_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            @php($selectedUser = old('user_id', optional($profile)->user_id))
            @foreach($users as $u)
                <option value="{{ $u->id }}" @selected($u->id == $selectedUser)>{{ $u->name }} ({{ $u->email }})</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="room_id" value="Room" />
        <select id="room_id" name="room_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <option value="">—</option>
            @php($selectedRoom = old('room_id', optional($profile)->room_id))
            @foreach($rooms as $r)
                <option value="{{ $r->id }}" @selected($r->id == $selectedRoom)>Room {{ $r->number }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('room_id')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="phone" value="Phone" />
        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" value="{{ old('phone', optional($profile)->phone) }}" />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>
    <div class="sm:col-span-2">
        <x-input-label for="address" value="Address" />
        <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" value="{{ old('address', optional($profile)->address) }}" />
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="emergency_contact_name" value="Emergency Contact Name" />
        <x-text-input id="emergency_contact_name" name="emergency_contact_name" type="text" class="mt-1 block w-full" value="{{ old('emergency_contact_name', optional($profile)->emergency_contact_name) }}" />
        <x-input-error :messages="$errors->get('emergency_contact_name')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="emergency_contact_phone" value="Emergency Contact Phone" />
        <x-text-input id="emergency_contact_phone" name="emergency_contact_phone" type="text" class="mt-1 block w-full" value="{{ old('emergency_contact_phone', optional($profile)->emergency_contact_phone) }}" />
        <x-input-error :messages="$errors->get('emergency_contact_phone')" class="mt-2" />
    </div>
</div>
