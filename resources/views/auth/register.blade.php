<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Surname -->
        <div class="mt-4">
            <x-input-label for="surname" :value="__('Фамилия')" />
            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="family-name" />
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>
        
        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Имя')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Patranomic -->
        <div class="mt-4">
            <x-input-label for="patranomic" :value="__('Отчество')" />
            <x-text-input id="patranomic" class="block mt-1 w-full" type="text" name="patranomic" :value="old('patranomic')" required autofocus autocomplete="additional-name" />
            <x-input-error :messages="$errors->get('patranomic')" class="mt-2" />
        </div>
        
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="tel" :value="__('Телефон')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="tel" name="tel" :value="old('tel')" autofocus autocomplete="additional-tel" />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Пароль')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Подтверждение пароля')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-end justify-end mt-4">
            <a class="mb-2 font-normal underline text-sm text-black-700 dark:text-black-700 hover:text-orange-600 dark:hover:text-gray-100 rounded-md" href="{{ route('login') }}">
                {{ __('Уже зарегистрированы?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Регистрация') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
