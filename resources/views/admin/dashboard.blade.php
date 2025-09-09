<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="rounded-lg border border-gray-200 p-4">
                            <div class="text-sm text-gray-500">Total Rooms</div>
                            <div class="mt-2 text-2xl font-semibold">--</div>
                        </div>
                        <div class="rounded-lg border border-gray-200 p-4">
                            <div class="text-sm text-gray-500">Occupancy Rate</div>
                            <div class="mt-2 text-2xl font-semibold">--</div>
                        </div>
                        <div class="rounded-lg border border-gray-200 p-4">
                            <div class="text-sm text-gray-500">Active Maintenance</div>
                            <div class="mt-2 text-2xl font-semibold">--</div>
                        </div>
                    </div>
                    <div class="mt-6 text-sm text-gray-600">Reports placeholder (Power BI to be integrated later).</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
