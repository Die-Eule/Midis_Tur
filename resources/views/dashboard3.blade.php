<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center">
        <div class="font-kslab uppercase mt-16 flex flex-col justify-center items-center text-3xl text-orange-600">
            <p>{{$department->name}}</p>
            <p class="mt-8">Войти / Зарегистрироваться</p>
        </div>

        <div class="xl:columns-2 mt-14">
            <button class="bg-[url('../images/video.png')] bg-cover bg-center p-10 rounded-xl w-[500px] h-[280px] mb-10 mx-6 relative shadow-lg"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'video-tour')">
                <p class="text-black text-base absolute bottom-0 left-0 bg-white/85 w-[100%] rounded-b-xl py-2">&emsp;Посмотрите небольшой видео-обзор кафедры</p>
            </button>

            <a href="{{ route('dashboard6') }}"><div class="bg-[url('../images/foto.png')] bg-cover bg-center p-10 rounded-xl w-[500px] h-[280px] mb-10 mx-6 relative shadow-lg">
                <p class="text-black text-base absolute bottom-0 left-0 bg-white/85 w-[100%] rounded-b-xl py-2">&emsp;Посмотрите фото с кафедры</p>
            </div></a>

            <a href="{{ route('dashboard4', $department->id) }}"><div class="bg-[url('../images/lehrer.png')] bg-cover bg-center p-10 rounded-xl w-[500px] h-[280px] mb-10 mx-6 relative shadow-lg">
                <p class="text-black text-base absolute bottom-0 left-0 bg-white/85 w-[100%] rounded-b-xl py-2">&emsp;Познакомьтесь с преподавателями кафедры</p>
            </div></a>

            <a href="{{ route('dashboard5') }}"><div class="bg-[url('../images/{{$department->pic}}')] bg-cover bg-center p-10 rounded-xl w-[500px] h-[280px] mb-10 mx-6 relative shadow-lg">
                <p class="text-black text-base absolute bottom-0 left-0 bg-white/85 w-[100%] rounded-b-xl py-2">&emsp;Взгляните на работы студентов кафедры</p>
            </div></a>
        </div>

        <x-modal name="video-tour" maxWidth="7xl" shift="20">
            <video controls autoplay loop muted>
                <source src="{{ Vite::asset('resources/video/'.$department->video) }}" type="video/mp4">
                Ваш браузер не поддерживает встроенные видео.
            </video>
        </x-modal>

</x-app-layout>
