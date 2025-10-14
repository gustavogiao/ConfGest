<div id="upcoming-list" class="transition-all duration-300">
    <h3 class="text-2xl font-bold text-indigo-700 dark:text-indigo-300 mb-6 flex items-center gap-3">
        <i class="fa-solid fa-calendar-days text-indigo-500 text-2xl"></i>
        Upcoming Conferences
    </h3>
    @if($upcoming->count())
        <ul class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($upcoming as $conference)
                <li>
                    @include('conference.partials.conference-card', ['conference' => $conference, 'from' => 'my'])
                </li>
            @endforeach
        </ul>
    @else
        @include('components.empty-state', [
            'icon' => 'fa-face-sad-tear',
            'iconColor' => 'text-indigo-200 dark:text-indigo-700',
            'message' => 'No upcoming conferences found.'
        ])
    @endif
</div>
