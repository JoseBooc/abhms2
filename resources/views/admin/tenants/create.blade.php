<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Tenant Profile</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.tenants.store') }}" class="space-y-4">
                        @csrf
                        @include('admin.tenants.partials.form', ['profile' => null, 'users' => $users, 'rooms' => $rooms])
                        <div class="text-right">
                            <x-primary-button>Save</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
