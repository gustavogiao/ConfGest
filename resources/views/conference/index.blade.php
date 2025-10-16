<x-app-layout>
    <x-slot name="header">
        <x-header :title="__('Conferences')" subtitle="Discover and explore upcoming conferences"/>
    </x-slot>
    <div class="py-12 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('conference.partials.search-bar')
            @include('conference.partials.conference-results-section', ['conferences' => $conferences])
        </div>
    </div>
</x-app-layout>
