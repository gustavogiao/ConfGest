<div class="flex justify-end">
    <div class="flex items-center gap-3">
        <i class="fa-solid fa-filter text-indigo-600 text-xl"></i>
        <label for="conferenceType" class="text-base font-medium text-gray-700 dark:text-gray-200">Filter:</label>
        <select id="conferenceType" class="px-3 py-2 rounded-lg border-gray-300 dark:bg-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-400 transition" onchange="toggleConferenceList()">
            <option value="upcoming">Upcoming</option>
            <option value="past">Past</option>
        </select>
    </div>
</div>
