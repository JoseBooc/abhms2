<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Profile</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if (session('status'))
                        <div class="mb-4 rounded-md border border-green-200 bg-green-50 p-3 text-green-800">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('tenant.profile.update') }}" class="grid gap-4 sm:grid-cols-2">
                        @csrf
                        <div>
                            <x-input-label for="phone" value="Phone" />
                            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" value="{{ old('phone', $profile->phone) }}" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                        <div class="sm:col-span-2">
                            <x-input-label for="address" value="Address" />
                            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" value="{{ old('address', $profile->address) }}" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="emergency_contact_name" value="Emergency Contact Name" />
                            <x-text-input id="emergency_contact_name" name="emergency_contact_name" type="text" class="mt-1 block w-full" value="{{ old('emergency_contact_name', $profile->emergency_contact_name) }}" />
                            <x-input-error :messages="$errors->get('emergency_contact_name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="emergency_contact_phone" value="Emergency Contact Phone" />
                            <x-text-input id="emergency_contact_phone" name="emergency_contact_phone" type="text" class="mt-1 block w-full" value="{{ old('emergency_contact_phone', $profile->emergency_contact_phone) }}" />
                            <x-input-error :messages="$errors->get('emergency_contact_phone')" class="mt-2" />
                        </div>
                        <div class="sm:col-span-2 text-right">
                            <x-primary-button>Save</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
