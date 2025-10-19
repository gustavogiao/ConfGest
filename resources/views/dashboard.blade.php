<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('dashboard.dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(auth()->user()->type && auth()->user()->type->description === 'Admin')
                        <h3 class="text-2xl font-bold text-indigo-500 mb-4">
                            <i class="fas fa-user-shield"></i> {{ __('dashboard.welcome_admin') }}
                        </h3>
                        <p>{{ __('dashboard.admin_panel') }}</p>
                        <ul class="mt-4 list-disc list-inside space-y-2">
                            <li>
                                <a href="{{ route('admin.conferences.index') }}" class="text-indigo-600 dark:text-indigo-400">
                                    {{ __('dashboard.manage_conferences') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.speakers.index') }}" class="text-indigo-600 dark:text-indigo-400">
                                    {{ __('dashboard.manage_speakers') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.sponsors.index') }}" class="text-indigo-600 dark:text-indigo-400">
                                    {{ __('dashboard.manage_sponsors') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.users.index') }}" class="text-indigo-600 dark:text-indigo-400">
                                    {{ __('dashboard.manage_users') }}
                                </a>
                            </li>
                        </ul>
                    @else
                        <h3 class="text-xl font-semibold text-green-500 mb-4">
                            <i class="fas fa-user"></i> {{ __('dashboard.welcome_user', ['name' => auth()->user()->firstname]) }}
                        </h3>
                        <p>{{ __('dashboard.user_panel') }}</p>
                        <a href="{{ route('my.conferences') }}" class="mt-4 inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            {{ __('dashboard.my_conferences') }}
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
