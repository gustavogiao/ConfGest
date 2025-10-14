<x-app-layout>
    <x-slot name="header">
        @include('conference.partials.conference-header-info', ['conference' => $conference])
    </x-slot>
    <div class="py-12 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @include('conference.partials.hero-section', ['conference' => $conference])
            @include('conference.partials.description-section', ['conference' => $conference])
            <div class="space-y-8">
                @include('conference.partials.speakers-section', ['conference' => $conference])
                @include('conference.partials.sponsors-section', ['conference' => $conference])
                @include('conference.partials.participants-section', ['conference' => $conference])
            </div>
        </div>
    </div>
</x-app-layout>
