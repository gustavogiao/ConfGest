<x-app-layout>
    <x-slot name="header">
        <x-header :title="__('Admin - Speakers Management')" subtitle="Manage all conferences, add new ones, edit or delete existing speakers." />
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <x-page-header :title="'Speakers List'" :route="route('admin.speakers.create')" button="Add New Speaker" />
                <x-success-message />
                @include('admin.speakers.partials.table', ['speakers' => $speakers])
                <div class="mt-4">
                    {{ $speakers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
