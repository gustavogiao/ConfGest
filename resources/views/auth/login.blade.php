<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mt-5">Welcome Back!</h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Please enter your credentials to log in to your account.
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="bg-white dark:bg-gray-900 shadow-lg rounded-xl p-8 space-y-6 max-w-md mx-auto mt-10">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="font-semibold text-indigo-600" />
            <div class="relative">
                <i class="fas fa-envelope absolute left-3 top-3 text-gray-400"></i>
                <x-text-input id="email" class="pl-10 block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 transition" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="font-semibold text-indigo-600" />
            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                <x-text-input id="password" class="pl-10 block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 transition" type="password" name="password" required autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-4 px-6 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-bold transition">
                <i class="fas fa-sign-in-alt mr-2"></i> {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <div class="text-center mt-6">
        <span class="text-gray-600 dark:text-gray-400 text-sm">
            Without an account?
        </span>
        <a href="{{ route('register') }}" class="text-indigo-600 dark:text-indigo-400 font-semibold hover:underline ms-2">
            Register
        </a>
    </div>
</x-guest-layout>
