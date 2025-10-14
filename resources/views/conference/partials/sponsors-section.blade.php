<div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-8">
    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6 flex items-center gap-2">
        <i class="fa-solid fa-handshake text-purple-500"></i> Our Sponsors
    </h3>
    @if($conference->sponsors->count())
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($conference->sponsors as $sponsor)
                <div
                    class="p-4 bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900 dark:to-purple-800 rounded-lg border border-purple-200 dark:border-purple-700 hover:shadow-md transition">
                    <p class="font-semibold text-purple-900 dark:text-purple-100 text-sm mb-2">
                        {{ $sponsor->name }}
                    </p>
                    <span
                        class="inline-block px-2 py-1 bg-purple-200 dark:bg-purple-700 text-purple-800 dark:text-purple-200 rounded text-xs font-medium">
                                        {{ $sponsor->category }}
                                    </span>
                </div>
            @endforeach
        </div>
    @else
        <x-empty-state
            icon="fa-person-hiking"
            iconColor="text-gray-300"
            message="This conference doesn't have sponsors yet."
        />
    @endif
</div>
