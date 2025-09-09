<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-semibold text-gray-900">Room Reservations</h1>
        <p class="mt-2 text-gray-600">Submit a reservation request.</p>
    </div>
    <form class="space-y-4">
        <div>
            <x-input-label for="name" value="Full Name" />
            <x-text-input id="name" type="text" class="mt-1 block w-full" />
        </div>
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" type="email" class="mt-1 block w-full" />
        </div>
        <div>
            <x-input-label for="phone" value="Phone" />
            <x-text-input id="phone" type="text" class="mt-1 block w-full" />
        </div>
        <div>
            <x-input-label for="preferred_room_type" value="Preferred Room Type" />
            <x-text-input id="preferred_room_type" type="text" class="mt-1 block w-full" />
        </div>
        <div>
            <x-input-label for="message" value="Message" />
            <textarea id="message" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
        </div>
        <div class="text-right">
            <x-primary-button type="button">Send Request</x-primary-button>
        </div>
    </form>
</x-guest-layout>
