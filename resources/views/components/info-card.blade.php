<div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border-l-4 {{ $borderColor ?? 'border-gray-300' }} hover:shadow-lg transition">
    <div class="flex items-center gap-3">
        <div class="p-3 {{ $iconBg ?? 'bg-gray-100 dark:bg-gray-900' }} rounded-lg">
            <i class="fa-solid {{ $icon }} {{ $iconColor ?? 'text-gray-600' }} text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $label }}</p>
            <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $value }}</p>
        </div>
    </div>
</div>
