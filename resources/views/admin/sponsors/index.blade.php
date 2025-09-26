<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-white">
            <i class="fas fa-users"></i> Sponsors Management
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <div class="flex justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Sponsors List</h3>
                    <a href="{{ route('admin.sponsors.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        <i class="fas fa-plus"></i> Add New Sponsor
                    </a>
                </div>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Name</th>
                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Category</th>
                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Active</th>
                        <th class="px-4 py-2 text-right text-gray-700 dark:text-gray-300">Action's</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($sponsors as $sponsor)
                        <tr class="border-t border-gray-200 dark:border-gray-700">
                            <td class="px-4 py-2 text-gray-900 dark:text-gray-100">{{ $sponsor->name }}</td>
                            <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $sponsor->category }}</td>
                            <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $sponsor->display_status }}</td>
                            <td class="px-4 py-2 text-right flex gap-2 justify-end items-center">
                                <a href="{{ route('admin.sponsors.show', $sponsor) }}"
                                   class="inline-flex items-center px-3 py-1 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition-colors duration-200"
                                   title="Ver Detalhes do Orador">
                                    <i class="fas fa-eye mr-1"></i> Show
                                </a>
                                <a href="{{ route('admin.sponsors.edit', $sponsor) }}"
                                   class="inline-flex items-center px-3 py-1 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200"
                                   title="Editar Orador">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <form action="{{ route('admin.sponsors.destroy', $sponsor) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-3 py-1 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition-colors duration-200"
                                            onclick="return confirm('Are you sure you want to delete this sponsor?');"
                                            title="Apagar Orador">
                                        <i class="fas fa-trash-alt mr-1"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">No sponsors found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $sponsors->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
