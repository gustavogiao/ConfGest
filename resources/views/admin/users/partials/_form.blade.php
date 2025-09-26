<form method="POST"
      action="{{ $action }}"
      enctype="multipart/form-data"
      class="space-y-6">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    @unless($isEdit)
        <!-- First Name -->
        <div>
            <x-input-label for="firstname" value="First Name *" />
            <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full"
                          value="{{ old('firstname', $user->firstname ?? '') }}" required autofocus />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div>
            <x-input-label for="lastname" value="Last Name *" />
            <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full"
                          value="{{ old('lastname', $user->lastname ?? '') }}" required />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Username -->
        <div>
            <x-input-label for="username" value="Username *" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full"
                          value="{{ old('username', $user->username ?? '') }}" required />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" value="Email *" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                          value="{{ old('email', $user->email ?? '') }}" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Description -->
        <div>
            <x-input-label for="description" value="Description *" />
            <textarea id="description" name="description" rows="4"
                      class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 transition"
                      required>{{ old('description', $user->description ?? '') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>


        <!-- Password -->
        <div>
            <x-input-label for="password" value="Password *" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" value="Confirm Password *" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
    @endunless

    <!-- User Type -->
    <div>
        <x-input-label for="user_type_id" value="User Type *" />
        <select id="user_type_id" name="user_type_id"
                class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 transition" required>
            @foreach($userTypes as $type)
                <option value="{{ $type->id }}" {{ old('user_type_id', $user->user_type_id ?? '') == $type->id ? 'selected' : '' }}>
                    {{ $type->description }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('user_type_id')" class="mt-2" />
    </div>

    <!-- Active -->
    <div class="flex items-center">
        <input type="hidden" name="is_active" value="0">
        <input id="is_active" name="is_active" type="checkbox" value="1"
               class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-500 dark:bg-gray-900"
            {{ old('is_active', $user->is_active ?? true) ? 'checked' : '' }}>
        <label for="is_active" class="ml-2 text-gray-700 dark:text-gray-300">Active</label>
    </div>

    <!-- Buttons -->
    <div class="flex justify-end gap-4">
        <a href="{{ route('admin.users.index') }}"
           class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
            Back
        </a>
        <x-primary-button>{{ $isEdit ? 'Update User' : 'Create User' }}</x-primary-button>
    </div>
</form>
