@props(['option' => '1'])

@php
$option = [
    '1' => [
        'color' => 'stone-50',
        'logo1' => 'telegram.png',
        'logo2' => 'vk.png',
        ],
    '2' => [
        'color' => 'orange-600',
        'logo1' => 'telegram_orange.png',
        'logo2' => 'vk_orange.png',
        ],
][$option];
@endphp

<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div class="max-w-full px-4 sm:px-6 lg:px-8 flex justify-between pt-4 max-h-[64px]">

        <div class="hidden sm:block min-w-[12%]"></div>

        <!-- Logo -->
        <div class="shrink-0 flex items-center min-w-[5rem] lg:min-w-[20rem]">
            <a href="{{ route('dashboard') }}" class="flex items-center">
                <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="" class="w-10">
                <p class="w-64 ml-6 font-medium text-{{$option['color']}} [text-shadow:_0_4px_4px_rgb(0_0_0_/_0.4)] hidden lg:block">Международный Институт Дизайна и Сервиса</p>
            </a>
        </div>

        <div class="hidden xs:flex items-center sm:min-w-[20rem]">
            <a href="https://t.me/officialMIDIS" target="_blank" rel="noopener noreferrer">
                <img src="{{ Vite::asset('resources/images/'.$option['logo1']) }}" alt="telegram-icon" class="w-10">
            </a>
            <a href="https://vk.com/midis" target="_blank" rel="noopener noreferrer">
                <img src="{{ Vite::asset('resources/images/'.$option['logo2']) }}" alt="vk-icon" class="w-10">
            </a>
            <div class="ml-8 font-medium">
                <a href="tel:+73512020073" class="text-{{$option['color']}} [text-shadow:_0_4px_4px_rgb(0_0_0_/_0.4)] block">
                    +7 (351) 202-00-73
                </a>
                <a href="mailto:info@midis.ru" class="text-{{$option['color']}} [text-shadow:_0_4px_4px_rgb(0_0_0_/_0.4)] block">
                    info@midis.ru
                </a>
            </div>
        </div>

        @auth
        <!-- Settings Dropdown -->
        <div class="flex items-center sm:ms-6 min-w-[12%] justify-end">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div class="text-{{$option['color']}} font-normal text-lg [text-shadow:_0_4px_4px_rgb(0_0_0_/_0.4)]">Мой профиль</div>

                        <div class="ms-1 text-{{$option['color']}} [text-shadow:_0_4px_4px_rgb(0_0_0_/_0.4)]">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Редактировать') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Выйти') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
        @else
        <x-secondary-button onclick="window.location='{{ route('login') }}'">{{ __('Войти') }}</x-secondary-button>
        @endauth
    </div>
</nav>
