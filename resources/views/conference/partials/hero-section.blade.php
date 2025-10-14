<div class="grid md:grid-cols-3 gap-6 mb-8">
    <x-info-card icon="fa-calendar" iconColor="text-indigo-600" iconBg="bg-indigo-100 dark:bg-indigo-900"
                 borderColor="border-indigo-600" label="Date"
                 :value="$conference->conference_date->format('M d, Y')"/>
    <x-info-card icon="fa-location-dot" iconColor="text-purple-600"
                 iconBg="bg-purple-100 dark:bg-purple-900" borderColor="border-purple-600" label="Location"
                 :value="$conference->location"/>
    <x-info-card icon="fa-users" iconColor="text-pink-600" iconBg="bg-pink-100 dark:bg-pink-900"
                 borderColor="border-pink-600" label="Registered"
                 :value="$conference->participants->count() . ' Participants'"/>
</div>
