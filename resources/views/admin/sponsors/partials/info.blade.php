<div class="space-y-4">
    <p class="text-lg text-gray-900 dark:text-gray-100">
        <strong>Name:</strong> {{ $sponsor->name }}
    </p>

    <p class="text-gray-700 dark:text-gray-300">
        <strong>Category:</strong> {{ $sponsor->category ?? '—' }}
    </p>

    <p class="text-gray-700 dark:text-gray-300">
        <strong>Status:</strong>
        <span class="{{ $sponsor->status_class }}">
            {{ $sponsor->display_status }}
        </span>
    </p>
</div>
