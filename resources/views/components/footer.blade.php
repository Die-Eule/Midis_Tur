@props(['option' => '1'])

@php
$option = [
    '1' => [
        'color' => 'bg-black text-stone-50',
        'logo1' => 'telegram.png',
        'logo2' => 'vk.png',
        'gap' => '',
        ],
    '2' => [
        'color' => 'text-orange-600',
        'logo1' => 'telegram_orange.png',
        'logo2' => 'vk_orange.png',
        'gap' => 'mt-4 hi-ls:mt-16',
        ],
][$option];
@endphp

<div class="max-w-full {{$option['gap']}} px-6 lg:px-8 pt-4 flex justify-between xs:justify-center items-center {{$option['color']}}">

    <!-- Logo -->
    <div class="shrink-0 flex flex-col xs:flex-row xs:items-center xs:min-w-[5rem] lg:min-w-[20rem] justify-between min-h-[90px]">
        <a href="{{ route('dashboard') }}" class="flex items-center">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo" class="w-10">
            <p class="w-64 ml-6 font-medium hidden md:block">Международный Институт Дизайна и Сервиса</p>
        </a>
        <p class="xs:hidden">©&nbsp;2025</p>
    </div>

    <div class="flex flex-col xs:flex-row items-center xs:min-w-[20rem] lg:mx-20">
        <div class="w-full xs:w-auto flex justify-around">
            <img src="{{ Vite::asset('resources/images/'.$option['logo1']) }}" alt="telegram-icon" class="w-10">
            <img src="{{ Vite::asset('resources/images/'.$option['logo2']) }}" alt="vk-icon" class="w-10">
        </div>
        <div class="xs:ml-8 font-medium">
            <p>+7 (351) 202-00-73</p>
            <p>info@midis.ru</p>
        </div>
    </div>

    <p class="hidden xs:block">©&nbsp;2025</p>
</div>
