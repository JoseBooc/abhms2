<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Rooms</h2>
            <a href="{{ route('admin.rooms.create') }}" class="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Add Room</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if (session('status'))
                        <div class="mb-4 rounded-md border border-green-200 bg-green-50 p-3 text-green-800">{{ session('status') }}</div>
                    @endif

                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                        @forelse ($rooms as $room)
                            <div class="rounded-lg border border-gray-200 p-4">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-700">Room {{ $room->number }}</p>
                                    <span class="rounded-full px-2 py-0.5 text-xs font-medium
                                        @if($room->status==='available') bg-green-100 text-green-700 @elseif($room->status==='reserved') bg-yellow-100 text-yellow-700 @elseif($room->status==='occupied') bg-red-100 text-red-700 @else bg-gray-100 text-gray-700 @endif">
                                        {{ str_replace('_',' ', ucfirst($room->status)) }}
                                    </span>
                                </div>
                                <div class="mt-3 text-sm text-gray-600">Type: {{ $room->type ?? '—' }}</div>
                                <div class="mt-1 text-sm text-gray-900">Rate: ₱{{ number_format($room->rate,2) }}/month</div>
                                <div class="mt-1 text-sm text-gray-600">Capacity: {{ $room->capacity }}</div>
                                <div class="mt-4 flex gap-2">
                                    <a href="{{ route('admin.rooms.edit', $room) }}" class="rounded-md border border-gray-300 px-3 py-1.5 text-sm">Edit</a>
                                    <form method="POST" action="{{ route('admin.rooms.destroy', $room) }}" onsubmit="return confirm('Delete this room?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-md bg-red-600 px-3 py-1.5 text-sm text-white">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-600">No rooms found.</p>
                        @endforelse
                    </div>

                    <div class="mt-6">{{ $rooms->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
