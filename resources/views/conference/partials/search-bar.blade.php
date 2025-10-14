<div class="mb-10">
    <form method="GET" action="{{ route('conference.index') }}" class="flex gap-3">
        <div class="flex-1 relative">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Search conferences by name or acronym..."
                   class="w-full border-2 border-gray-300 dark:border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:border-indigo-500 dark:bg-gray-700 dark:text-white transition" />
            <svg class="absolute right-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium transition transform hover:scale-105 shadow-md">
            Search
        </button>
        @if(request('search'))
            <a href="{{ route('conference.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg font-medium transition transform hover:scale-105 shadow-md">
                Limpar
            </a>
        @endif
    </form>
</div>
