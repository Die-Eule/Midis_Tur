<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center">
        <div class="font-kslab uppercase mt-16 flex justify-center items-center text-3xl text-orange-600">
            <a href="{{ route('dashboard3') }}" class="pr-8"><img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:h-[32pxresources/views/dashboard4.blade.php]" alt=""></a>
            <p>Кафедра математики и информатики</p>
        </div>

        <div class="flex flex-wrap justify-between w-[450px] xl:w-[900px] mt-14">
            <div class="mb-8">
                <img src="{{ Vite::asset('resources/images/lehrer1.png') }}" alt="" class="w-[375px] h-[520px] shadow-lg rounded-xl object-cover">
                <p class="font-kslab text-orange-600 text-lg mt-4">Кондаков Сергей Александрович</p>
                <p class="w-[375px]">Заведующий кафедрой математики и информатики</p>
            </div>

            <div class="mb-8">
                <img src="{{ Vite::asset('resources/images/lehrer2.png') }}" alt="" class="w-[375px] h-[520px] shadow-lg rounded-xl object-cover">
                <p class="font-kslab text-orange-600 text-lg mt-4">Прилепина Елена Васильевна</p>
                <p class="w-[375px]">Методист КМиИ</p>
            </div>
            
            <div class="mb-8">
                <img src="{{ Vite::asset('resources/images/lehrer3.png') }}" alt="" class="w-[375px] h-[520px] shadow-lg rounded-xl object-cover">
                <p class="font-kslab text-orange-600 text-lg mt-4">Горанов Павел Сергеевич</p>
                <p class="w-[375px]">Преподаватель</p>
            </div>

            <div class="mb-8">
                <img src="{{ Vite::asset('resources/images/lehrer4.png') }}" alt="" class="w-[375px] h-[520px] shadow-lg rounded-xl object-cover">
                <p class="font-kslab text-orange-600 text-lg mt-4">Баженов Максим Андреевич</p>
                <p class="w-[375px]">Преподаватель</p>
            </div>

        </div>

</x-app-layout>
