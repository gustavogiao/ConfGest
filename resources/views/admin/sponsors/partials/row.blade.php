<tr class="border-t border-gray-200 dark:border-gray-700">
    <td class="px-4 py-2 text-gray-900 dark:text-gray-100">{{ $sponsor->name }}</td>
    <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $sponsor->category }}</td>
    <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $sponsor->display_status }}</td>
    <td class="px-4 py-2 text-right flex gap-2 justify-end items-center">
        @include('admin.sponsors.partials.actions', ['sponsor' => $sponsor])
    </td>
</tr>
