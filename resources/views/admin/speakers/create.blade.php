<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-indigo-600 dark:text-indigo-400 leading-tight">
            ➕ Criar Novo Orador
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                @include('admin.speakers.partials._form', [
                    'action' => route('admin.speakers.store'),
                    'isEdit' => false,
                    'speaker' => null,
                ])
            </div>
        </div>
    </div>
</x-app-layout>
