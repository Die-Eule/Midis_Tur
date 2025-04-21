<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center">
        <div class="font-kslab uppercase mt-16 flex justify-center items-center text-3xl text-orange-600">
            <a href="{{ route('dashboard3') }}" class="pr-8"><img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:h-[32pxresources/views/dashboard4.blade.php]" alt=""></a>
            <p>Кафедра математики и информатики</p>
        </div>

        <div class="xl:columns-2 mt-14">
            <img src="{{ Vite::asset('resources/images/foto1.png') }}" alt="" class="w-[500px] h-[320px] shadow-lg rounded-xl object-cover mb-10 mx-6">

            <img src="{{ Vite::asset('resources/images/foto2.png') }}" alt="" class="w-[500px] h-[320px] shadow-lg rounded-xl object-cover mb-10 mx-6">

            <img src="{{ Vite::asset('resources/images/foto3.png') }}" alt="" class="w-[500px] h-[320px] shadow-lg rounded-xl object-cover mb-10 mx-6">

            <img src="{{ Vite::asset('resources/images/foto4.png') }}" alt="" class="w-[500px] h-[320px] shadow-lg rounded-xl object-cover mb-10 mx-6">

            <img src="{{ Vite::asset('resources/images/foto5.png') }}" alt="" class="w-[500px] h-[320px] shadow-lg rounded-xl object-cover mb-10 mx-6">

            <img src="{{ Vite::asset('resources/images/foto6.png') }}" alt="" class="w-[500px] h-[320px] shadow-lg rounded-xl object-cover mb-10 mx-6">
        </div>

</x-app-layout>
