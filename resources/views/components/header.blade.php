<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
        @if(isset($subtitle))
            <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">{{ $subtitle }}</p>
        @endif
    </div>
    {{ $slot }}
</div>
