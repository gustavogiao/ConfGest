<tr class="border-t border-gray-200 dark:border-gray-700">
    <td class="px-4 py-2 text-gray-900 dark:text-gray-100">{{ $user->firstname }}</td>
    <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $user->lastname }}</td>
    <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $user->email }}</td>
    <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $user->type->description ?? '-' }}</td>
    <td class="px-4 py-2 text-right flex gap-2 justify-end items-center">
        @include('admin.users.partials.actions', ['user' => $user])
    </td>
</tr>
