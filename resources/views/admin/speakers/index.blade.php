<x-app-layout>
    <x-slot name="header">
        <x-conference-header :title="__('Admin - Create Speaker')" subtitle="Manage all conferences, add new ones, edit or delete existing speakers." />
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <x-page-header :title="'Speakers List'" :route="route('admin.speakers.create')" button="Add New Speaker" />

                <x-success-message />

                <table class="min-w-full border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Name</th>
                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Affiliation</th>
                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Type</th>
                        <th class="px-4 py-2 text-right text-gray-700 dark:text-gray-300">Action's</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($speakers as $speaker)
                        <tr class="border-t border-gray-200 dark:border-gray-700">
                            <td class="px-4 py-2 text-gray-900 dark:text-gray-100">{{ $speaker->name }}</td>
                            <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $speaker->affiliation ?? '-' }}</td>
                            <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $speaker->type->description ?? 'N/A' }}</td>
                            <td class="px-4 py-2 text-right flex gap-2 justify-end items-center">
                                <a href="{{ route('admin.speakers.show', $speaker) }}"
                                   class="inline-flex items-center px-3 py-1 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition-colors duration-200"
                                   title="Ver Detalhes do Orador">
                                    <i class="fas fa-eye mr-1"></i> Show
                                </a>
                                <a href="{{ route('admin.speakers.edit', $speaker) }}"
                                   class="inline-flex items-center px-3 py-1 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200"
                                   title="Editar Orador">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <form action="{{ route('admin.speakers.destroy', $speaker) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-3 py-1 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition-colors duration-200"
                                            onclick="return confirm('Are you sure you want to delete this speaker?');"
                                            title="Apagar Orador">
                                        <i class="fas fa-trash-alt mr-1"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">No speakers found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $speakers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
