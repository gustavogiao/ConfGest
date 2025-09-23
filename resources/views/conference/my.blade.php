<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Conferences') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Futuras -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
                    <i class="fa-solid fa-calendar-days text-indigo-600 me-2"></i>
                    Upcoming Conferences
                </h3>
            @if($upcoming->count())
                    <ul class="space-y-4">
                        @foreach($upcoming as $conference)
                            <li class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-indigo-100 dark:hover:bg-indigo-900 transition">
                                <a href="{{ route('conference.show', $conference) }}" class="block">
                                    <h4 class="font-semibold text-indigo-600 dark:text-indigo-400">
                                        {{ $conference->acronym }} — {{ $conference->name }}
                                    </h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $conference->location }} · {{ $conference->conference_date->format('d/m/Y') }}
                                    </p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500 dark:text-gray-400">There are no dozens of upcoming conferences registered.</p>
                @endif
            </div>

            <!-- Passadas -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
                    <i class="fa-solid fa-scroll text-yellow-700 me-2"></i>
                    Past Conferences
                </h3>
            @if($past->count())
                    <ul class="space-y-4">
                        @foreach($past as $conference)
                            <li class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-700">
                                <a href="{{ route('conference.show', $conference) }}" class="block">
                                    <h4 class="font-semibold text-indigo-600 dark:text-indigo-400">
                                        {{ $conference->acronym }} — {{ $conference->name }}
                                    </h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $conference->location }} · {{ $conference->conference_date->format('d/m/Y') }}
                                    </p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500 dark:text-gray-400">Ainda não participaste em nenhuma conferência.</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
