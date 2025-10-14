<x-app-layout>
    <x-slot name="header">
        <x-conference-header :title="__('Admin - Conferences Management')" subtitle="Manage all conferences, add new ones, edit or delete existing conferences." />
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <x-page-header :title="'Conferences List'" :route="route('admin.conferences.create')"  :button="'Add New Conference'" />

                <x-success-message />

                @include('admin.conferences.partials.table', ['conferences' => $conferences])

                <div class="mt-4">
                    {{ $conferences->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
