<x-app-layout>
    <x-slot name="header">
        <x-header :title="__('Admin - Create Sponsor')" subtitle="Add a new sponsor to the conference." />
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                @include('admin.sponsors.partials._form', [
                    'action' => route('admin.sponsors.store'),
                    'isEdit' => false,
                    'speaker' => null,
                ])
            </div>
        </div>
    </div>
</x-app-layout>
