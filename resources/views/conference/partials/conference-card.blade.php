<a href="{{ route('conference.show', ['conference' => $conference->id, 'from' => $from ?? null]) }}"
   class="stretched-link">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden h-full border border-gray-200 dark:border-gray-700">
        <!-- Card Header with Gradient -->
        <div class="h-32 bg-gradient-to-br from-indigo-500 via-indigo-600 to-purple-600 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <defs>
                        <pattern id="pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <circle cx="10" cy="10" r="1" fill="white"/>
                        </pattern>
                    </defs>
                    <rect width="100" height="100" fill="url(#pattern)"/>
                </svg>
            </div>
            <div class="relative h-full flex items-center justify-center">
                <div class="text-white text-center">
                    <p class="text-sm font-medium opacity-90">Conference</p>
                    <h3 class="text-3xl font-bold">{{ $conference->acronym }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Content -->
        <div class="p-6">
            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-3 group-hover:text-indigo-600 transition line-clamp-2">
                {{ $conference->name }}
            </h4>

            <!-- Meta Info -->
            <div class="space-y-3 mb-4">
                <!-- Date -->
                <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="font-medium">{{ $conference->conference_date->format('M d, Y') }}</span>
                </div>

                <!-- Location -->
                <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="font-medium">{{ $conference->location }}</span>
                </div>
            </div>

            <!-- Description -->
            <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed line-clamp-3 mb-4">
                {{ $conference->description }}
            </p>

            <!-- Footer -->
            <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <button class="w-full text-indigo-600 dark:text-indigo-400 font-semibold text-sm hover:text-indigo-700 dark:hover:text-indigo-300 transition flex items-center justify-center gap-2">
                    View Details
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</a>
