<div id="past-list" class="transition-all duration-300" style="display:none;">
    <h3 class="text-2xl font-bold text-yellow-700 dark:text-yellow-300 mb-6 flex items-center gap-3">
        <i class="fa-solid fa-scroll text-yellow-500 text-2xl"></i>
        Past Conferences
    </h3>
    @if($past->count())
        <ul class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($past as $conference)
                <li>
                    @include('conference.partials.conference-card', ['conference' => $conference, 'from' => 'my'])
                </li>
            @endforeach
        </ul>
    @else
        <x-empty-state
            icon="fa-face-sad-tear"
            iconColor="text-yellow-200 dark:text-yellow-700"
            message="You haven't attended any conferences yet."
        />
    @endif
</div>
