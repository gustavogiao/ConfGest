<form method="POST"
      action="{{ $action }}"
      enctype="multipart/form-data"
      class="space-y-6">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <!-- Acronym -->
    <div>
        <x-input-label for="acronym" value="Acronym *" />
        <x-text-input id="acronym" name="acronym" type="text" class="mt-1 block w-full"
                      value="{{ old('acronym', $conference->acronym ?? '') }}" required autofocus />
        <x-input-error :messages="$errors->get('acronym')" class="mt-2" />
    </div>

    <!-- Name -->
    <div>
        <x-input-label for="name" value="Conference Name *" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                      value="{{ old('name', $conference->name ?? '') }}" required />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Description -->
    <div>
        <x-input-label for="description" value="Description" />
        <textarea id="description" name="description" rows="4"
                  class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">{{ old('description', $conference->description ?? '') }}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <!-- Location -->
    <div>
        <x-input-label for="location" value="Location *" />
        <x-text-input id="location" name="location" type="text" class="mt-1 block w-full"
                      value="{{ old('location', $conference->location ?? '') }}" required />
        <x-input-error :messages="$errors->get('location')" class="mt-2" />
    </div>

    <!-- Conference Date -->
    <div>
        <x-input-label for="conference_date" value="Conference Date *" />
        <x-text-input id="conference_date" name="conference_date" type="date" class="mt-1 block w-full"
                      value="{{ old('conference_date', isset($conference->conference_date) ? $conference->conference_date->format('Y-m-d') : '') }}" required />
        <x-input-error :messages="$errors->get('conference_date')" class="mt-2" />
    </div>

    <!-- Speakers -->
    <div>
        <x-input-label for="speakers" value="Speakers" />
        <select id="speakers" name="speakers[]" multiple
                class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
            @foreach($speakers as $speaker)
                <option value="{{ $speaker->id }}"
                    {{ (collect(old('speakers', $conference->speakers?->pluck('id') ?? []))->contains($speaker->id)) ? 'selected' : '' }}>
                    {{ $speaker->name }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('speakers')" class="mt-2" />
    </div>

    <!-- Sponsors -->
    <div>
        <x-input-label for="sponsors" value="Sponsors" />
        <select id="sponsors" name="sponsors[]" multiple
                class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
            @foreach($sponsors as $sponsor)
                <option value="{{ $sponsor->id }}"
                    {{ (collect(old('sponsors', $conference->sponsors->pluck('id') ?? []))->contains($sponsor->id)) ? 'selected' : '' }}>
                    {{ $sponsor->name }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('sponsors')" class="mt-2" />
    </div>

    <!-- Buttons -->
    <div class="flex justify-end gap-4">
        <a href="{{ route('admin.conferences.index') }}"
           class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
            Back
        </a>
        <x-primary-button>{{ $isEdit ? 'Update Conference' : 'Save Conference' }}</x-primary-button>
    </div>
</form>
