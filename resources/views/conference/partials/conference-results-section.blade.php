@if($conferences->count())

    <!-- Results Count -->
    <div class="mb-6">
        <p class="text-gray-600 dark:text-gray-400 text-sm">
            Showing <span class="font-semibold text-indigo-600">{{ $conferences->count() }}</span>
            conference(s)
        </p>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        @foreach($conferences as $conference)
            @include('conference.partials.conference-card', ['conference' => $conference])
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-12">
        {{ $conferences->links('pagination::tailwind') }}
    </div>

@else
    <!-- Empty State -->
    <x-empty-state
        icon="fa-face-sad-tear"
        iconColor="text-gray-200 dark:text-gray-700"
        message="No conferences found. Try adjusting your search or filters."
    />
@endif
