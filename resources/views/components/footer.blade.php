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
        'gap' => 'mt-16',
        ],
][$option];
@endphp

<div class="max-w-full p-10 {{$option['gap']}} sm:px-6 lg:px-8 flex justify-center items-center max-h-[64px] {{$option['color']}}">

    <!-- Logo -->
    <div class="shrink-0 flex items-center min-w-[20rem]">
        <a href="{{ route('dashboard') }}" class="flex items-center">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo" class="w-10">
            <p class="w-64 ml-6 font-medium">Международный институт дизайна и сервиса</p>
        </a>
    </div>

    <div class="flex items-center min-w-[20rem] lg:mx-20">
        <img src="{{ Vite::asset('resources/images/'.$option['logo1']) }}" alt="telegram-icon" class="w-10">
        <img src="{{ Vite::asset('resources/images/'.$option['logo2']) }}" alt="vk-icon" class="w-10">
        <div class="ml-8 font-medium">
            <p>+7 (351) 202-00-73</p>
            <p>info@midis.ru</p>
        </div>
    </div>

    <p>© 2025</p>
</div>
