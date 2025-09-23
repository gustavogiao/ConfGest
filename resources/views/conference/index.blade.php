<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Conferences') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if($conferences->count())
                    <ul class="space-y-4">
                        @foreach($conferences as $conference)
                            <li class="border-b pb-4">
                                <h3 class="text-lg font-bold text-indigo-600">
                                    <a href="{{ route('conference.show', $conference) }}">
                                        {{ $conference->acronym }} — {{ $conference->name }}
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300">
                                    {{ $conference->location }} · {{ $conference->conference_date->format('d/m/Y') }}
                                </p>
                                <p class="mt-2 text-gray-700 dark:text-gray-400">
                                    {{ Str::limit($conference->description, 150) }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-600 dark:text-gray-300">
                        Nenhuma conferência encontrada.
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
