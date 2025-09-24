<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl text-indigo-600 dark:text-indigo-400 leading-tight">
                <i class="fas fa-eye"></i>Sponsor Details: {{ $sponsor->name }}
            </h2>
            <a href="{{ route('admin.sponsors.index') }}"
               class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
                <i class="fas fa-arrow-left"></i> Back to Sponsors List
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                <!-- Foto -->
                @if($sponsor->logo)
                    <div class="mb-6 text-center">
                        <img src="{{ asset('storage/' . $sponsor->logo) }}"
                             alt="Photo of {{ $sponsor->name }}"
                             class="w-48 h-48 object-cover rounded-full mx-auto border-4 border-indigo-500">
                    </div>
                @endif

                <!-- Informações -->
                <div class="space-y-4">
                    <p class="text-lg text-gray-900 dark:text-gray-100">
                        <strong>Name:</strong> {{ $sponsor->name }}
                    </p>

                    <p class="text-gray-700 dark:text-gray-300">
                        <strong>Category:</strong> {{ $sponsor->category ?? '—' }}
                    </p>

                    <p class="text-gray-700 dark:text-gray-300">
                        <strong>Status:</strong>
                        <span class="{{ $sponsor->status_class }}">
                            {{ $sponsor->display_status }}
                        </span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
