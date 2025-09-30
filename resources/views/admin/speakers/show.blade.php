<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl text-indigo-600 dark:text-indigo-400 leading-tight">
                <i class="fas fa-microphone-alt"></i> Speaker: {{ $speaker->name }}
            </h2>
            <a href="{{ route('admin.speakers.index') }}"
               class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                <!-- Foto -->
                @if($speaker->photo)
                    <div class="mb-6 text-center">
                        <img src="{{ asset('storage/' . $speaker->photo) }}"
                             alt="Photo of {{ $speaker->name }}"
                             class="w-48 h-48 object-cover rounded-full mx-auto border-4 border-indigo-500">
                    </div>
                @endif

                <!-- Informações -->
                <div class="space-y-4">
                    <p class="text-lg text-gray-900 dark:text-gray-100">
                        <strong>Name:</strong> {{ $speaker->name }}
                    </p>

                    <p class="text-gray-700 dark:text-gray-300">
                        <strong>Affiliation:</strong> {{ $speaker->affiliation ?? '—' }}
                    </p>

                    <p class="text-gray-700 dark:text-gray-300">
                        <strong>Type:</strong> {{ $speaker->type->description ?? '—' }}
                    </p>
                    <p class="text-gray-700 dark:text-gray-300">
                        <strong>Website:</strong>
                        @if($speaker->page_link)
                            <a href="{{ $speaker->page_link }}" target="_blank" class="text-indigo-500 hover:underline">
                                {{ $speaker->page_link }}
                            </a>
                        @else
                            —
                        @endif
                    </p>

                    <p class="text-gray-700 dark:text-gray-300">
                        <strong>Status:</strong>
                        <span class="{{ $speaker->status_class }}">
                            {{ $speaker->display_status }}
                        </span>
                    </p>
                    @if(!empty($speaker->social_networks) && is_array($speaker->social_networks))
                        <div class="mt-4">
                            <strong class="text-gray-900 dark:text-gray-100">Social Networks:</strong>
                            <ul class="mt-2 space-y-1">
                                @foreach($speaker->social_networks as $link)
                                    <li>
                                        <a href="{{ $link }}" target="_blank" rel="noopener" class="text-indigo-500 hover:underline">
                                            {{ $link }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div>
                        <strong class="text-gray-900 dark:text-gray-100">Biography:</strong>
                        <p class="text-gray-600 dark:text-gray-400 mt-2">
                            {{ $speaker->biography ?? '—' }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
