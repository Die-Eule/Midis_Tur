<x-app-layout>
    <x-slot name="header2"></x-slot>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center">
        <div class="font-kslab uppercase mt-16 flex flex-col justify-center items-center text-3xl text-orange-600">
            <p>Кафедра математики и информатики</p>
            <p class="mt-8">Войти / Зарегистрироваться</p>
        </div>

        <div class="xl:columns-2 mt-14">
            <div class="bg-[url('../images/video.png')] bg-cover bg-center p-10 rounded-xl w-[500px] h-[280px] mb-10 mx-6 relative shadow-lg">
                <p class="text-black text-base absolute bottom-0 left-0 bg-white/85 w-[100%] rounded-b-xl py-2">&emsp;Посмотрите небольшой видео-обзор кафедры</p>
            </div>

            <div class="bg-[url('../images/foto.png')] bg-cover bg-center p-10 rounded-xl w-[500px] h-[280px] mb-10 mx-6 relative shadow-lg">
                <p class="text-black text-base absolute bottom-0 left-0 bg-white/85 w-[100%] rounded-b-xl py-2">&emsp;Посмотрите фото с кафедры</p>
            </div>

            <div class="bg-[url('../images/lehrer.png')] bg-cover bg-center p-10 rounded-xl w-[500px] h-[280px] mb-10 mx-6 relative shadow-lg">
                <p class="text-black text-base absolute bottom-0 left-0 bg-white/85 w-[100%] rounded-b-xl py-2">&emsp;Познакомьтесь с преподавателями кафедры</p>
            </div>

            <div class="bg-[url('../images/job.png')] bg-cover bg-center p-10 rounded-xl w-[500px] h-[280px] mb-10 mx-6 relative shadow-lg">
                <p class="text-black text-base absolute bottom-0 left-0 bg-white/85 w-[100%] rounded-b-xl py-2">&emsp;Взгляните на работы студентов кафедры</p>
            </div>
        </div>

    <!--footer-->
    <div class="max-w-full p-10 mt-16 sm:px-6 lg:px-8 flex justify-center items-center max-h-[64px] text-orange-600">

        <!-- Logo -->
        <div class="shrink-0 flex items-center min-w-[20rem]">
            <a href="{{ route('dashboard') }}" class="flex items-center">
                <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo" class="w-10">
                <p class="w-64 ml-6 font-medium">Международный институт дизайна и сервиса</p>
            </a>
        </div>

        <div class="flex items-center min-w-[20rem] lg:mx-20">
            <img src="{{ Vite::asset('resources/images/telegram_orange.png') }}" alt="telegram-icon" class="w-10">
            <img src="{{ Vite::asset('resources/images/vk_orange.png') }}" alt="vk-icon" class="w-10">
            <div class="ml-8 font-medium">
                <p>+7 (351) 202-00-73</p>
                <p>info@midis.ru</p>
            </div>
        </div>

        <p>© 2025</p>
    </div>
</x-app-layout>
