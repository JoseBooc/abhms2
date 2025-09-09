<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tenant Profiles</h2>
            <a href="{{ route('admin.tenants.create') }}" class="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Add Tenant Profile</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if (session('status'))
                        <div class="mb-4 rounded-md border border-green-200 bg-green-50 p-3 text-green-800">{{ session('status') }}</div>
                    @endif

                    <div class="overflow-x-auto rounded-md border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Tenant</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Room</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Phone</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Emergency Contact</th>
                                    <th class="px-4 py-2"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($profiles as $p)
                                    <tr>
                                        <td class="px-4 py-2">{{ $p->user->name ?? '—' }}</td>
                                        <td class="px-4 py-2">{{ optional($p->room)->number ?? '—' }}</td>
                                        <td class="px-4 py-2">{{ $p->phone ?? '—' }}</td>
                                        <td class="px-4 py-2">{{ $p->emergency_contact_name ? ($p->emergency_contact_name.' ('.$p->emergency_contact_phone.')') : '—' }}</td>
                                        <td class="px-4 py-2 text-right">
                                            <a href="{{ route('admin.tenants.edit', $p) }}" class="rounded-md border border-gray-300 px-3 py-1.5">Edit</a>
                                            <form class="inline" method="POST" action="{{ route('admin.tenants.destroy', $p) }}" onsubmit="return confirm('Delete profile?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="rounded-md bg-red-600 px-3 py-1.5 text-white">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="5" class="px-4 py-6 text-center text-gray-600">No tenant profiles.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">{{ $profiles->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
