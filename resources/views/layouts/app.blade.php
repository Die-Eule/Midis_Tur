<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-inter antialiased">
        <div @class([
                'min-h-screen',
                'bg-stone-200' => ! @isset($attributes['specialStyle']),
                'bg-gray-100' => @isset($attributes['specialStyle']),
                "bg-[url('../images/background_main.png')]" => @isset($attributes['specialStyle']),
                "wide:bg-fit-w bg-fit-h" => @isset($attributes['specialStyle']),
        ])>
            @php
                $colorOption = @isset($attributes['specialStyle']) ? 1 : 2;
            @endphp

            <x-header :option=$colorOption/>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <x-footer :option=$colorOption/>

        </div>
    </body>
</html>
