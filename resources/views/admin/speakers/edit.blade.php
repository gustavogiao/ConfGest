<x-app-layout>
    <x-slot name="header">
        <x-header :title="__('Admin - Edit Speaker')" subtitle="Fill in the details below to update the speaker." />
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                @include('admin.speakers.partials._form', [
                    'action' => route('admin.speakers.update', $speaker),
                    'isEdit' => true,
                    'speaker' => $speaker,
                ])
            </div>
        </div>
    </div>
</x-app-layout>
