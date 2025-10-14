<x-app-layout>
    <x-slot name="header">
        <x-conference-header :title="__('My Conferences')" subtitle="See the conferences you are registered for"/>
    </x-slot>
    <div class="py-10 bg-gradient-to-br from-indigo-50 to-white dark:from-gray-900 dark:to-gray-800 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-10">
            @include('conference.partials.filter-card')
            @include('conference.partials.upcoming-list-section', ['upcoming' => $upcoming])
            @include('conference.partials.past-list-section', ['past' => $past])
        </div>
    </div>
</x-app-layout>
@vite('resources/js/conference-filters.js')
