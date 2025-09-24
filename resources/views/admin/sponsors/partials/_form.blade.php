<form method="POST"
      action="{{ $action }}"
      enctype="multipart/form-data"
      class="space-y-6">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <!-- Nome -->
    <div>
        <x-input-label for="name" value="Name of Sponsor *" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                      value="{{ old('name', $sponsor->name ?? '') }}" required autofocus />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Categoria -->
    <div>
        <x-input-label for="category" value="Category" />
        <select id="category" name="category"
                class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 transition">
            @foreach($ranks as $rank)
                <option value="{{ $rank }}" {{ old('category', $sponsor->category ?? '') == $rank ? 'selected' : '' }}>
                    {{ $rank }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>


    <!-- Logo -->
    <div>
        <x-input-label for="logo" value="Logo" />
        <input id="logo" name="logo" type="file" class="mt-1 block w-full text-sm text-gray-600 dark:text-gray-300" />
        <x-input-error :messages="$errors->get('logo')" class="mt-2" />

        @if($isEdit && !empty($sponsor->logo))
            <div class="mt-3">
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Logo atual:</p>
                <img src="{{ asset('storage/' . $sponsor->logo) }}"
                     alt="Logo do Sponsor"
                     class="w-32 h-32 object-cover rounded-lg border border-gray-300 dark:border-gray-700">
            </div>
        @endif
    </div>

    <!-- Ativo -->
    <div class="flex items-center">
        <input type="hidden" name="is_active" value="0">
        <input id="is_active" name="is_active" type="checkbox" value="1"
               class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-500 dark:bg-gray-900"
            {{ old('is_active', $sponsor->is_active ?? true) ? 'checked' : '' }}>
        <label for="is_active" class="ml-2 text-gray-700 dark:text-gray-300">Active</label>
    </div>

    <!-- Botões -->
    <div class="flex justify-end gap-4">
        <a href="{{ route('admin.sponsors.index') }}"
           class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
            Back
        </a>
        <x-primary-button>{{ $isEdit ? 'Update Sponsor' : 'Save Sponsor' }}</x-primary-button>
    </div>
</form>
