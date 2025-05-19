<x-app-layout specialStyle>

    <!--Body-->
    <div class="w-full h-[1016px]">
           <ul role="list" class="text-stone-50 list-disc marker:text-orange-400 flex w-[100%] justify-center">
            <li class="w-[20%] mt-[5%]">
                @if(!Auth::check() || !$subscription)
                    <form method="POST" action="{{ route('subscription.full') }}">
                        @csrf
                        @method('put')
                        <button type="submit" class="text-orange-400 underline underline-offset-4">Подпишитесь</button>
                        на рассылку всего института или отдельных кафедр и получайте уведомления об изменениях в институте
                    </form>
                @else
                    Вы подписаны на рассылку всего института
                @endif
            </li>
            {{-- <li class="w-[5%] mt-[10%] text-orange-600 uppercase text-2xl list-none">А<br>так<br>же</li> --}}
            <li class="w-[20%] mt-[12%]">
                <div class='flex-col justify-center'>
                    Отправьтесь в небольшое путешествие по всему институту
                    <div class="w-full"><img src="{{ Vite::asset('resources/images/doublearrow.png') }}" alt="" class="w-30 h-20 mx-auto"></div>
                </div>
            </li>
            {{-- <li class="w-[5%] mt-[8%] list-none text-orange-600 uppercase text-2xl">Или</li> --}}
            <li class="w-[25%] mt-[5%]">Посмотрите свой путь исходя из выбранной вами специальности</li>
            <li class="w-[20%] mt-[7%] list-none">
                <div>
                    <img src="{{ Vite::asset('resources/images/arrow_bg.svg') }}" alt="" class="w-40 h-40 mb-14">
                    <x-primary-button onclick="window.location='{{ route('dashboard2') }}'">Выбрать свой путь</x-primary-button>
                </div>
            </li>
           </ul>
    </div>
    <div class="w-full h-[641px] flex text-stone-50 [text-shadow:_0_4px_4px_rgb(0_0_0_/_0.9)]">
        <div class="border-stone-50 border-2 w-[50%] bg-[url('../images/background_math.png')] flex flex-col justify-center items-center">
            <img src="{{ Vite::asset('resources/images/logo_math.png') }}" alt="" class="w-60 h-50 max-xl:w-40 h-30">
            <p class="text-4xl font-normal w-[80%] text-center max-xl:text-3xl">Кафедра Математики и Информатики</p>
        </div>
        <div class="w-[50%] border-2 bg-orange-600 border-stone-50 flex flex-col justify-center items-center text-4xl font-normal max-xl:text-3xl">
            <p class="w-[80%] text-center">Отправьтесь в увлекательное путешествие по</p>
            <p class="font-kslab uppercase mt-10">нашим кафедрам</p>
        </div>
    </div>
    <div class="w-full h-[641px] flex text-stone-50 [text-shadow:_0_4px_4px_rgb(0_0_0_/_0.9)]">
        <div class="border-stone-50 border-2 w-[50%] bg-[url('../images/background_economy.png')] flex flex-col justify-center items-center">
            <img src="{{ Vite::asset('resources/images/logo_economy.png') }}" alt="" class="w-60 h-50 max-xl:w-40 h-30">
            <p class="text-4xl font-normal w-[80%] text-center max-xl:text-3xl">Кафедра Экономики и Управления</p>
        </div>
        <div class="border-stone-50 border-2 w-[50%] bg-[url('../images/background_design.png')] flex flex-col justify-center items-center">
            <img src="{{ Vite::asset('resources/images/logo_design.png') }}" alt="" class="w-60 h-50 max-xl:w-40 h-30">
            <p class="text-4xl font-normal w-[80%] text-center max-xl:text-3xl">Кафедра Дизайна</p>
        </div>
    </div>
    <div class="w-full h-[641px] flex text-stone-50 [text-shadow:_0_4px_4px_rgb(0_0_0_/_0.9)]">
        <div class="border-stone-50 border-2 w-[50%] bg-[url('../images/background_language.png')] flex flex-col justify-center items-center">
            <img src="{{ Vite::asset('resources/images/logo_language.png') }}" alt="" class="w-60 h-50 max-xl:w-40 h-30">
            <p class="text-4xl font-normal w-[80%] text-center max-xl:text-3xl">Кафедра Лингвистики</p>
        </div>
        <div class="border-stone-50 border-2 w-[50%] bg-[url('../images/background_service.png')] flex flex-col justify-center items-center">
            <img src="{{ Vite::asset('resources/images/logo_service.png') }}" alt="" class="w-60 h-50 max-xl:w-40 h-30">
            <p class="text-4xl font-normal w-[80%] text-center max-xl:text-3xl">Кафедра Гастрономии и Гостиничного дела</p>
        </div>
    </div>
    <div class="bg-orange-400 w-full h-[148px] border-stone-50 border-2 flex justify-center items-center [text-shadow:_0_4px_4px_rgb(0_0_0_/_0.9)]">
        <p class="text-4xl font-normal text-stone-50 w-[80%] text-center max-xl:text-3xl">Дополнительные зоны для наших студентов</p>
    </div>
    <div class="w-full h-[641px] flex text-stone-50 [text-shadow:_0_4px_4px_rgb(0_0_0_/_0.9)]">
        <div class="border-stone-50 border-2 w-[50%] bg-[url('../images/background_pool.png')] flex flex-col justify-center items-center">
            <p class="text-4xl font-normal w-[80%] text-center max-xl:text-3xl">25-метровый бассейн с трехступенчатой системой очистки воды и сауна</p>
        </div>
        <div class="border-stone-50 border-2 w-[50%] bg-[url('../images/background_gym.png')] flex flex-col justify-center items-center">
            <p class="text-4xl font-normal w-[80%] text-center max-xl:text-3xl">Спортивный зал</p>
        </div>
    </div>
    <div class="w-full h-[641px] flex text-stone-50 [text-shadow:_0_4px_4px_rgb(0_0_0_/_0.9)]">
        <div class="border-stone-50 border-2 w-[50%] bg-[url('../images/background_trainer.png')] flex flex-col justify-center items-center">
            <p class="text-4xl font-normal w-[80%] text-center max-xl:text-3xl">Тренажёрный зал</p>
        </div>
        <div class="border-stone-50 border-2 w-[50%] bg-[url('../images/background_hall.png')] flex flex-col justify-center items-center">
            <p class="text-4xl font-normal w-[80%] text-center max-xl:text-3xl">Актовый зал на 360 мест</p>
        </div>
    </div>
    <div class="w-full h-[641px] flex text-stone-50 [text-shadow:_0_4px_4px_rgb(0_0_0_/_0.9)]">
        <div class="border-stone-50 border-2 w-[50%] bg-[url('../images/background_library.png')] flex flex-col justify-center items-center">
            <p class="text-4xl font-normal w-[80%] text-center max-xl:text-3xl">Библиотека с более чем 60 000 бумажных и электронных изданий </p>
        </div>
        <div class="border-stone-50 border-2 w-[50%] bg-[url('../images/background_cafe.png')] flex flex-col justify-center items-center">
            <p class="text-4xl font-normal w-[80%] text-center max-xl:text-3xl">Кафе и буфет</p>
        </div>
    </div>
    
</x-app-layout>
