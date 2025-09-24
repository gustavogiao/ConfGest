<form method="POST"
      action="{{ $action }}"
      enctype="multipart/form-data"
      class="space-y-6">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <!-- Name -->
    <div>
        <x-input-label for="name" value="Speaker Name *" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                      value="{{ old('name', $speaker->name ?? '') }}" required autofocus />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Affiliation -->
    <div>
        <x-input-label for="affiliation" value="Affiliation" />
        <x-text-input id="affiliation" name="affiliation" type="text" class="mt-1 block w-full"
                      value="{{ old('affiliation', $speaker->affiliation ?? '') }}" />
        <x-input-error :messages="$errors->get('affiliation')" class="mt-2" />
    </div>

    <!-- Biography -->
    <div>
        <x-input-label for="biography" value="Biography" />
        <textarea id="biography" name="biography" rows="4"
                  class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">{{ old('biography', $speaker->biography ?? '') }}</textarea>
        <x-input-error :messages="$errors->get('biography')" class="mt-2" />
    </div>

    <!-- Photo -->
    <div>
        <x-input-label for="photo" value="Photo" />
        <input id="photo" name="photo" type="file" class="mt-1 block w-full text-sm text-gray-600 dark:text-gray-300" />
        <x-input-error :messages="$errors->get('photo')" class="mt-2" />

        @if($isEdit && !empty($speaker->photo))
            <div class="mt-3">
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Current photo:</p>
                <img src="{{ asset('storage/' . $speaker->photo) }}"
                     alt="Speaker photo"
                     class="w-32 h-32 object-cover rounded-lg border border-gray-300 dark:border-gray-700">
            </div>
        @endif
    </div>

    <!-- Personal Page Link -->
    <div>
        <x-input-label for="page_link" value="Personal Page / Website" />
        <x-text-input id="page_link" name="page_link" type="url" class="mt-1 block w-full"
                      value="{{ old('page_link', $speaker->page_link ?? '') }}" />
        <x-input-error :messages="$errors->get('page_link')" class="mt-2" />
    </div>

    <!-- Active -->
    <div class="flex items-center">
        <input type="hidden" name="is_active" value="0">
        <input id="is_active" name="is_active" type="checkbox" value="1"
               class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-500 dark:bg-gray-900"
            {{ old('is_active', $speaker->is_active ?? true) ? 'checked' : '' }}>
        <label for="is_active" class="ml-2 text-gray-700 dark:text-gray-300">Active</label>
    </div>

    <!-- Speaker Type -->
    <div>
        <x-input-label for="speaker_type_id" value="Speaker Type *" />
        <select id="speaker_type_id" name="speaker_type_id"
                class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
            <option value="">-- Select --</option>
            @foreach(\App\Models\SpeakerType::all() as $type)
                <option value="{{ $type->id }}"
                    {{ old('speaker_type_id', $speaker->speaker_type_id ?? '') == $type->id ? 'selected' : '' }}>
                    {{ $type->description }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('speaker_type_id')" class="mt-2" />
    </div>

    <!-- Buttons -->
    <div class="flex justify-end gap-4">
        <a href="{{ route('admin.speakers.index') }}"
           class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
            Back
        </a>
        <x-primary-button>{{ $isEdit ? 'Update Speaker' : 'Save Speaker' }}</x-primary-button>
    </div>
</form>
