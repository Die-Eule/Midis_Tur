<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Пароль')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-end justify-end mt-4">
                <a class="mb-2 font-normal underline text-sm text-black-700 dark:text-black-700 hover:text-orange-600 dark:hover:text-gray-100 rounded-md" href="{{ route('register') }}">
                    {{ __('Ещё не зарегистрированы?') }}
                </a>

            <x-primary-button class="ms-3">
                {{ __('Вход') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
