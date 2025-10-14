<tr class="border-t border-gray-200 dark:border-gray-700">
    <td class="px-4 py-2 text-gray-900 dark:text-gray-100">{{ $conference->acronym }}</td>
    <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $conference->name ?? '-' }}</td>
    <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $conference->location ?? 'N/A' }}</td>
    <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $conference->conference_date->format('d/m/Y') }}</td>
    <td class="px-4 py-2 text-right flex gap-2 justify-end items-center">
        @include('admin.conferences.partials.actions', ['conference' => $conference])
    </td>
</tr>
