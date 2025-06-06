<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center">
        <div class="font-kslab uppercase mt-8 md:mt-16 flex flex-col justify-center items-center text-3xl text-orange-600">
            <div class="flex flex-col md:flex-row items-center">
                <div>
                    <a href="{{ route('dashboard2') }}" class="flex items-center mb-8 md:mb-0">
                        <div class="w-[32px] h-[32px]"><img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:h-[32px]" alt=""></div>
                        <p class="md:hidden text-base pl-2">Назад</p>
                    </a>
                </div>
                <p class="px-5 md:px-0 text-center">{{$department->name}}</p>
            </div>
            <div class="mt-8 normal-case text-2xl font-inter font-light">
                @if(!Auth::check())
                    <a href="{{ route('login') }}" class="underline decoration-2"><p>Хочу быть с вами</p></a>
                @elseif(!$subscription)
                    <form method="POST" action="{{ route('subscription.add', $department->id) }}">
                        @csrf
                        @method('put')
                        <button type="submit" class="underline decoration-2">Подписаться на рассылку</button>
                    </form>
                @endif
            </div>
        </div>

        <div class="xl:columns-2 mt-14">
            <div class="bg-[url('../images/dep/video.png')] bg-cover bg-center p-10 rounded-xl w-[89vw] h-[50vw] ns:w-[500px] ns:h-[280px] mb-10 mx-6 relative shadow-lg cursor-pointer"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'video-tour')">
                <p class="text-black text-[3.3vw] xs:text-base absolute bottom-0 left-0 bg-white/85 w-[100%] rounded-b-xl py-2">&emsp;Посмотрите небольшой видео-обзор кафедры</p>
            </div>

            <a href="{{ route('dashboard6', $department->id) }}">
                <div class="bg-[url('../images/dep/foto.png')] bg-cover bg-center p-10 rounded-xl w-[89vw] h-[50vw] ns:w-[500px] ns:h-[280px] mb-10 mx-6 relative shadow-lg">
                    <p class="text-black text-[3.3vw] xs:text-base absolute bottom-0 left-0 bg-white/85 w-[100%] rounded-b-xl py-2">&emsp;Посмотрите фото с кафедры</p>
                </div>
            </a>

            <a href="{{ route('dashboard4', $department->id) }}">
                <div class="bg-[url('../images/dep/lehrer.png')] bg-cover bg-center p-10 rounded-xl w-[89vw] h-[50vw] ns:w-[500px] ns:h-[280px] mb-10 mx-6 relative shadow-lg">
                    <p class="text-black text-[3.3vw] xs:text-base absolute bottom-0 left-0 bg-white/85 w-[100%] rounded-b-xl py-2">&emsp;Познакомьтесь с преподавателями кафедры</p>
                </div>
            </a>

            <a href="{{ route('dashboard5', $department->id) }}">
                <div style="background-image: url({{ Vite::asset('resources/images/dep/students.png') }})"
                        class="bg-cover bg-center p-10 rounded-xl w-[89vw] h-[50vw] ns:w-[500px] ns:h-[280px] mb-10 mx-6 relative shadow-lg">
                    <p class="text-black text-[3.3vw] xs:text-base absolute bottom-0 left-0 bg-white/85 w-[100%] rounded-b-xl py-2">&emsp;Взгляните на работы студентов кафедры</p>
                </div>
            </a>
        </div>

        <x-modal-viz name="video-tour" maxWidth="7xl" shift>
            <video controls
                    x-init="$watch('show', value => {
                        if (value) {
                            $el.play();
                        } else {
                            $el.pause();
                            $el.currentTime = 0;
                        } })">
                <source src="{{ asset('storage/'.$department->video) }}" type="video/mp4">
                Ваш браузер не поддерживает встроенные видео.
            </video>
        </x-modal-viz>

</x-app-layout>
