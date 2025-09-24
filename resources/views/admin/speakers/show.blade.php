<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-indigo-600 dark:text-indigo-400 leading-tight">
                👤 Orador: {{ $speaker->name }}
            </h2>
            <a href="{{ route('admin.speakers.index') }}"
               class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
                <i class="fas fa-arrow-left"></i> Voltar à Lista
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
                             alt="Foto do orador"
                             class="w-48 h-48 object-cover rounded-full mx-auto border-4 border-indigo-500">
                    </div>
                @endif

                <!-- Informações -->
                <div class="space-y-4">
                    <p class="text-lg text-gray-900 dark:text-gray-100">
                        <strong>Nome:</strong> {{ $speaker->name }}
                    </p>

                    <p class="text-gray-700 dark:text-gray-300">
                        <strong>Afiliação:</strong> {{ $speaker->affiliation ?? '—' }}
                    </p>

                    <p class="text-gray-700 dark:text-gray-300">
                        <strong>Tipo:</strong> {{ $speaker->type->description ?? '—' }}
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
                        <span class="{{ $speaker->is_active ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                            {{ $speaker->is_active ? 'Ativo' : 'Inativo' }}
                        </span>
                    </p>

                    <div>
                        <strong class="text-gray-900 dark:text-gray-100">Biografia:</strong>
                        <p class="text-gray-600 dark:text-gray-400 mt-2">
                            {{ $speaker->biography ?? '—' }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
