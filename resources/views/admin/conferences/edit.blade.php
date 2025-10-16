<x-app-layout>
    <x-slot name="header">
        <x-header :title="__('Admin - Edit Conference')" subtitle="Fill in the details below to create a new conference." />
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                @include('admin.conferences.partials._form', [
                    'action' => route('admin.conferences.update', $conference),
                    'isEdit' => true,
                    'conference' => $conference,
                    'speakers' => $speakers,
                    'sponsors' => $sponsors,
                ])
            </div>
        </div>
    </div>
</x-app-layout>
