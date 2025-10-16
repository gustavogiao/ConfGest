<x-app-layout>
    <x-slot name="header">
        <x-header :title="__('Admin - Sponsors Management')" subtitle="Manage all conferences, add new ones, edit or delete existing speakers." />
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <x-page-header :title="'Sponsors List'" :route="route('admin.sponsors.create')" button="Add New Sponsor" />
                <x-success-message />
                @include('admin.sponsors.partials.table', ['sponsors' => $sponsors])
                <div class="mt-4">
                    {{ $sponsors->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
