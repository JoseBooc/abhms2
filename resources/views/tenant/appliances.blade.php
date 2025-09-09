<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Appliance Declarations</h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if (session('status'))
                        <div class="mb-4 rounded-md border border-green-200 bg-green-50 p-3 text-green-800">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('tenant.appliances.store') }}" class="grid gap-4 sm:grid-cols-3">
                        @csrf
                        <div class="sm:col-span-2">
                            <x-input-label for="name" value="Appliance Name" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="wattage" value="Wattage (W)" />
                            <x-text-input id="wattage" name="wattage" type="number" min="0" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('wattage')" class="mt-2" />
                        </div>
                        <div class="sm:col-span-3">
                            <x-input-label for="notes" value="Notes" />
                            <x-text-input id="notes" name="notes" type="text" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('notes')" class="mt-2" />
                        </div>
                        <div class="sm:col-span-3 text-right">
                            <x-primary-button>Add Appliance</x-primary-button>
                        </div>
                    </form>

                    <div class="mt-8 overflow-x-auto rounded-md border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Name</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Wattage</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Status</th>
                                    <th class="px-4 py-2"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($appliances as $a)
                                    <tr>
                                        <td class="px-4 py-2">{{ $a->name }}</td>
                                        <td class="px-4 py-2">{{ $a->wattage ?? '—' }}</td>
                                        <td class="px-4 py-2">{{ $a->approved ? 'Approved' : 'Pending' }}</td>
                                        <td class="px-4 py-2 text-right">
                                            <form method="POST" action="{{ route('tenant.appliances.destroy', $a) }}" onsubmit="return confirm('Remove appliance?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="rounded-md bg-red-600 px-3 py-1.5 text-white">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="px-4 py-6 text-center text-gray-600">No appliances declared.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">{{ $appliances->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
