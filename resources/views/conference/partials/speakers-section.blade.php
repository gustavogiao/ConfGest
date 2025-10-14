<div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-8">
    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6 flex items-center gap-2">
        <i class="fa-solid fa-microphone-lines text-indigo-500"></i> Featured Speakers
    </h3>
    @if($conference->speakers->count())
        <div class="grid gap-4 md:grid-cols-2">
            @foreach($conference->speakers as $speaker)
                <div
                    class="p-5 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 rounded-lg border border-gray-200 dark:border-gray-600 hover:shadow-md transition">
                    <p class="font-semibold text-gray-900 dark:text-gray-100 text-lg">
                        {{ $speaker->name }}
                    </p>
                    <div class="mt-2 flex items-center gap-2">
                                            <span
                                                class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-100 rounded-full text-sm font-medium">
                                                {{ $speaker->type->description ?? 'Speaker' }}
                                            </span>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                        <i class="fa-solid fa-building text-gray-400 mr-2"></i> {{ $speaker->affiliation }}
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <x-empty-state
            icon="fa-microphone-slash"
            iconColor="text-gray-300"
            message="No speakers associated with this conference yet."
        />
    @endif
</div>
