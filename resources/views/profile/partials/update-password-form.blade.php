<section>
    <header>
        <h2 class="text-xl font-medium text-orange-600 font-kslab">
            {{ __('Обновить пароль') }}
        </h2>

        <p class="mt-1 text-sm text-gray-900">
            {{ __('Убедитесь, что в вашей учетной записи используется длинный случайный пароль, чтобы оставаться в безопасности.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 w-full flex justify-between">
        @csrf
        @method('put')

        <div class="flex flex-col w-[49%] space-y-6">
            <div class="w-full">
                <x-input-label for="update_password_current_password" :value="__('Текущий пароль')" />
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div class="w-full">
                <x-input-label for="update_password_password" :value="__('Новый пароль')" />
                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div class="w-full">
                <x-input-label for="update_password_password_confirmation" :value="__('Подтверждение пароля')" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="w-[49%] flex flex-row-reverse justify-start items-end gap-4">
            <x-primary-button>{{ __('Обновить') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
