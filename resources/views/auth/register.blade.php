<x-guest-layout>

    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mt-5">Welcome to Confgest!</h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Please fill in the details to create your account.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="bg-white dark:bg-gray-900 shadow-lg rounded-xl p-8 space-y-6 max-w-md mx-auto mt-10">
        @csrf

        <!-- Firstname -->
        <div>
            <x-input-label for="firstname" :value="__('First Name')" class="font-semibold text-indigo-600" />
            <div class="relative">
                <i class="fas fa-user absolute left-3 top-3 text-gray-400"></i>
                <x-text-input id="firstname" class="pl-10 block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 transition" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="given-name" />
            </div>
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
        </div>

        <!-- Lastname -->
        <div>
            <x-input-label for="lastname" :value="__('Last Name')" class="font-semibold text-indigo-600" />
            <div class="relative">
                <i class="fas fa-user-tag absolute left-3 top-3 text-gray-400"></i>
                <x-text-input id="lastname" class="pl-10 block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 transition" type="text" name="lastname" :value="old('lastname')" required autocomplete="family-name" />
            </div>
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" class="font-semibold text-indigo-600" />
            <div class="relative">
                <i class="fas fa-at absolute left-3 top-3 text-gray-400"></i>
                <x-text-input id="username" class="pl-10 block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 transition" type="text" name="username" :value="old('username')" required autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="font-semibold text-indigo-600" />
            <div class="relative">
                <i class="fas fa-envelope absolute left-3 top-3 text-gray-400"></i>
                <x-text-input id="email" class="pl-10 block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 transition" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="font-semibold text-indigo-600" />
            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                <x-text-input id="password" class="pl-10 block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 transition" type="password" name="password" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="font-semibold text-indigo-600" />
            <div class="relative">
                <i class="fas fa-lock-open absolute left-3 top-3 text-gray-400"></i>
                <x-text-input id="password_confirmation" class="pl-10 block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 transition" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ms-4 px-6 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-bold transition">
                <i class="fas fa-user-plus mr-2"></i> {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
