<x-conference-header :title="$conference->acronym" :subtitle="$conference->name">
    <div class="flex items-center gap-4">
        <a href="{{ request('from') === 'my' ? route('my.conferences') : route('conference.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-100 transition">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
        @auth
            @php
                $isRegistered = $conference->participants->contains(auth()->id());
                $isAdmin = auth()->user()->type->description === 'Admin';
            @endphp

            @if(!$isAdmin)
                @if($isRegistered)
                    <form method="POST" action="{{ route('conference.unregister', $conference) }}"
                          class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition transform hover:scale-105 shadow-md">
                            <i class="fa-solid fa-user-minus"></i> Unsubscribe
                        </button>
                    </form>
                @else
                    <form method="POST" action="{{ route('conference.register', $conference) }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition transform hover:scale-105 shadow-md">
                            <i class="fa-solid fa-user-plus"></i> Subscribe
                        </button>
                    </form>
                @endif
            @endif
        @endauth
    </div>
</x-conference-header>
