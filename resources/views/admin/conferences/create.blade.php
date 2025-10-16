<x-app-layout>
    <x-slot name="header">
        <x-x-header :title="__('Admin - Create Conference')" subtitle="Fill in the details below to create a new conference." />
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                @include('admin.conferences.partials._form', [
                    'action' => route('admin.conferences.store'),
                    'isEdit' => false,
                    'conference' => $conference,
                    'speakers' => $speakers,
                    'sponsors' => $sponsors,
                ])
            </div>
        </div>
    </div>
</x-app-layout>
