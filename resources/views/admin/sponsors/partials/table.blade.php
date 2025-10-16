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
        @include('admin.sponsors.partials.row', ['sponsor' => $sponsor])
    @empty
        <tr>
            <td colspan="4" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">No sponsors found.</td>
        </tr>
    @endforelse
    </tbody>
</table>
