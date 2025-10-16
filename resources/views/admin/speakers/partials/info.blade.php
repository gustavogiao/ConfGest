<div class="space-y-4">
    <p class="text-lg text-gray-900 dark:text-gray-100">
        <strong>Name:</strong> {{ $speaker->name }}
    </p>

    <p class="text-gray-700 dark:text-gray-300">
        <strong>Affiliation:</strong> {{ $speaker->affiliation ?? '—' }}
    </p>

    <p class="text-gray-700 dark:text-gray-300">
        <strong>Type:</strong> {{ $speaker->type->description ?? '—' }}
    </p>
    <p class="text-gray-700 dark:text-gray-300">
        <strong>Website:</strong>
        @if($speaker->page_link)
            <a href="{{ $speaker->page_link }}" target="_blank" class="text-indigo-500 hover:underline">
                {{ $speaker->page_link }}
            </a>
        @else
            —
        @endif
    </p>

    <p class="text-gray-700 dark:text-gray-300">
        <strong>Status:</strong>
        <span class="{{ $speaker->status_class }}">
                            {{ $speaker->display_status }}
                        </span>
    </p>
    @if(!empty($speaker->social_networks) && is_array($speaker->social_networks))
        <div class="mt-4">
            <strong class="text-gray-900 dark:text-gray-100">Social Networks:</strong>
            <ul class="mt-2 space-y-1">
                @foreach($speaker->social_networks as $link)
                    <li>
                        <a href="{{ $link }}" target="_blank" rel="noopener" class="text-indigo-500 hover:underline">
                            {{ $link }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <strong class="text-gray-900 dark:text-gray-100">Biography:</strong>
        <p class="text-gray-600 dark:text-gray-400 mt-2">
            {{ $speaker->biography ?? '—' }}
        </p>
    </div>
</div>
