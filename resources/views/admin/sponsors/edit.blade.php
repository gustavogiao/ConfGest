<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-indigo-600 dark:text-indigo-400 leading-tight">
            <i class="fas fa-edit"></i> Edit Sponsor: {{ $sponsor->name }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                @include('admin.sponsors.partials._form', [
                    'action' => route('admin.sponsors.update', $sponsor),
                    'isEdit' => true,
                    'speaker' => $sponsor,
                ])
            </div>
        </div>
    </div>
</x-app-layout>
