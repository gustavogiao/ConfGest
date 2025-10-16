<div class="space-y-4">
    <p class="text-lg text-gray-900 dark:text-gray-100">
        <strong>Name:</strong> {{ $user->firstname }} {{ $user->lastname }}
    </p>

    <p class="text-gray-700 dark:text-gray-300">
        <strong>Username:</strong> {{ $user->username ?? '—' }}
    </p>

    <p class="text-gray-700 dark:text-gray-300">
        <strong>Email:</strong> {{ $user->email ?? '—' }}
    </p>

    <p class="text-gray-700 dark:text-gray-300">
        <strong>User Type:</strong> {{ $user->type->description ?? '—' }}
    </p>

    <p class="text-gray-700 dark:text-gray-300">
        <strong>Description:</strong> {{ $user->description ?? '—' }}
    </p>

    <p class="text-gray-700 dark:text-gray-300">
        <strong>Status:</strong>
        <span class="{{ $user->status_class }}">
            {{ $user->display_status }}
        </span>
    </p>
</div>
