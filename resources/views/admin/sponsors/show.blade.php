<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            @include('admin.sponsors.partials.header-info')
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                @include('admin.sponsors.partials.photo', ['sponsor' => $sponsor])
                @include('admin.sponsors.partials.info', ['sponsor' => $sponsor])
            </div>
        </div>
    </div>

</x-app-layout>
