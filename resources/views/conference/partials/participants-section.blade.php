<div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-8">
    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6 flex items-center gap-2">
        <i class="fa-solid fa-people-group text-pink-500"></i> Registered Participants
        <span class="ml-auto text-lg font-normal text-gray-600 dark:text-gray-400">({{ $conference->participants->count() }})</span>
    </h3>
    @if($conference->participants->count())
        <div class="grid gap-3 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach($conference->participants as $participant)
                <div
                    class="p-4 bg-gradient-to-br from-pink-50 to-pink-100 dark:from-pink-900 dark:to-pink-800 rounded-lg border border-pink-200 dark:border-pink-700 hover:shadow-md transition">
                    <p class="font-semibold text-gray-900 dark:text-gray-100">
                        {{ $participant->firstname }} {{ $participant->lastname }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                        <i class="fa-solid fa-at text-gray-400 mr-1"></i> {{ $participant->username }}
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <x-empty-state
            icon="fa-user-slash"
            iconColor="text-gray-300"
            message="No participants registered yet. Be the first!"
        />
    @endif
</div>
