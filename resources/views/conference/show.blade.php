<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-indigo-600 dark:text-indigo-400 leading-tight">
                {{ $conference->acronym }} — {{ $conference->name }}
            </h2>

            <!-- Botões -->
            <div class="flex gap-3">
                <!-- Back -->
                <a href="{{ url()->previous()  }}" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    <i class="fa-solid fa-arrow-left"></i> Back
                </a>
                @auth
                    @php
                        $isRegistered = $conference->participants->contains(auth()->id());
                        $isAdmin = auth()->user()->type->description === 'Admin';
                    @endphp

                    @if(!$isAdmin)
                        @if($isRegistered)
                            <!-- Cancelar inscrição -->
                            <form method="POST" action="{{ route('conference.unregister', $conference) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                                    <i class="fa-solid fa-user-minus"></i> Unsubscribe
                                </button>
                            </form>
                        @else
                            <!-- Inscrever -->
                            <form method="POST" action="{{ route('conference.register', $conference) }}">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                                    <i class="fa-solid fa-user-plus"></i> Subscribe
                                </button>
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Info Geral -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
                    <i class="fa-solid fa-circle-info text-indigo-500 mr-2"></i> General Information
                </h3>
                <p class="text-gray-700 dark:text-gray-300"><strong>Location:</strong> {{ $conference->location }}</p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Date:</strong> {{ $conference->conference_date->format('d/m/Y') }}</p>
                <p class="mt-3 text-gray-600 dark:text-gray-400">{{ $conference->description }}</p>
            </div>

            <!-- Oradores -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
                    <i class="fa-solid fa-microphone-lines text-indigo-500 mr-2"></i> Speakers
                </h3>
                @if($conference->speakers->count())
                    <div class="grid gap-4 md:grid-cols-2">
                        @foreach($conference->speakers as $speaker)
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-700">
                                <p class="font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $speaker->name }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $speaker->type->description ?? 'N/A' }} — {{ $speaker->affiliation }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 dark:text-gray-400">No associated speakers.</p>
                @endif
            </div>

            <!-- Sponsors -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
                    <i class="fa-solid fa-handshake text-indigo-500 mr-2"></i> Sponsors
                </h3>
                @if($conference->sponsors->count())
                    <div class="flex flex-wrap gap-3">
                        @foreach($conference->sponsors as $sponsor)
                            <span class="px-4 py-2 bg-indigo-100 dark:bg-indigo-800 text-indigo-800 dark:text-indigo-100 rounded-lg text-sm font-medium">
                                {{ $sponsor->name }} — {{ $sponsor->category }}
                            </span>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 dark:text-gray-400">No associated sponsors</p>
                @endif
            </div>

            <!-- Participantes -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
                    <i class="fa-solid fa-users text-indigo-500 mr-2"></i> Participants
                </h3>
                @if($conference->participants->count())
                    <ul class="grid gap-2 sm:grid-cols-2 md:grid-cols-3">
                        @foreach($conference->participants as $participant)
                            <li class="text-sm bg-gray-50 dark:bg-gray-800 px-3 py-2 rounded-lg border border-gray-200 dark:border-gray-700">
                                <span class="font-medium text-gray-900 dark:text-gray-100">{{ $participant->firstname }} {{ $participant->lastname }}</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">({{ $participant->username }})</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500 dark:text-gray-400">No participants registered yet.</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
