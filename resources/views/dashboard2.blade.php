<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center">
        <!-- <a class="text-9xl text-center" href="{{ route('dashboard') }}" class="flex items-center">
            <p>Ссылка</p>
        </a> -->
        <div class="font-kslab uppercase mt-16 flex flex-col justify-center items-center text-3xl text-orange-600">
            <p>Где вы планируете проходить обучение?</p>
            <p class="mt-8">Колледж на базе 9 классов / 11 классов</p>
        </div>

        <div class="xl:columns-2 mt-14">
            <div class="bg-white p-10 rounded-xl w-[500px] mb-10 mx-6 shadow-lg">
                <p class="font-kslab text-orange-600 text-lg mb-4">Дизайн</p>
                <ul role="list" class="list-disc marker:text-black ml-6 text-base/7">
                    <li><a href="{{ route('dashboard3') }}" class="flex items-center">Графический дизайн и брендинг</a></li>
                    <li>3D Моделирование для компьютерных игр</li>
                    <li>Дизайн одежды и аксессуаров</li>
                    <li>Дизайн интерьера</li>
                    <li>Веб-дизайн и мобильная разработка</li>
                </ul>
            </div>

            <div class="bg-white p-10 rounded-xl w-[500px] mb-10 mx-6 shadow-lg">
                <p class="font-kslab text-orange-600 text-lg mb-4">IT-технологии</p>
                <ul role="list" class="list-disc marker:text-black  ml-6">
                    <li>Разработка веб и мультимедийных приложений</li>
                </ul>
            </div>

            <div class="bg-white p-10 rounded-xl w-[500px] mb-10 mx-6 shadow-lg">
                <p class="font-kslab text-orange-600 text-lg mb-4">Экономика и управление</p>
                <ul role="list" class="list-disc marker:text-black  ml-6">
                    <li>Предпринимательство и интернет-маркетинг</li>
                    <li>Организация кредитных и расчетных банковских операций</li>
                </ul>
            </div>

            <div class="bg-white p-10 rounded-xl w-[500px] mb-10 mx-6 shadow-lg">
                <p class="font-kslab text-orange-600 text-lg mb-4">Туризм и гостеприимство</p>
                <ul role="list" class="list-disc marker:text-black  ml-6">
                    <li>Администрирование отеля и организация экскурсионных услуг</li>
                </ul>
            </div>
        </div>

        <div class="font-kslab uppercase flex flex-col justify-center items-center text-3xl text-orange-600">
            <p class="mt-8">Институт</p>
        </div>
<!-- start-changin -->
        <div class="xl:columns-2 mt-14">
            <div class="bg-white p-10 rounded-xl w-[500px] mb-10 mx-6 shadow-lg">
                <p class="font-kslab text-orange-600 text-lg mb-4">Дизайн</p>
                <ul role="list" class="list-disc marker:text-black ml-6 text-base/7">
                    <li>Цифровая графика в индустрии компьютерных игр</li>
                    <li>Графический дизайн и брендинг</li>
                    <li>Дизайн среды</li>
                    <li>Дизайн одежды и маркетинг в модной индустрии</li>
                    <li>Web-дизайн и мобильная разработка</li>
                    <li>Промышленный дизайн</li>
                    <li>Гастрономический дизайн</li>
                </ul>
            </div>

            <div class="bg-white p-10 rounded-xl w-[500px] mb-10 mx-6 shadow-lg">
                <p class="font-kslab text-orange-600 text-lg mb-4">Ресторанный и гостиничный бизнес</p>
                <ul role="list" class="list-disc marker:text-black  ml-6">
                    <li>Менеджмент в ресторанном и гостиничном бизнесе</li>
                    <li>Управление бизнес-процессами в гастрономии</li>
                    <li>Управление в гостиничном бизнесе</li>
                </ul>
            </div>

            <div class="bg-white p-10 rounded-xl w-[500px] mb-10 mx-6 shadow-lg">
                <p class="font-kslab text-orange-600 text-lg mb-4">IT - технологии</p>
                <ul role="list" class="list-disc marker:text-black  ml-6">
                    <li>Разработка компьютерных игр и приложений с виртуальной и дополненной реальностью (VR/AR)</li>
                    <li>Разработка веб- и мобильных приложений</li>
                    <li>Управление IT-проектами</li>
                </ul>
            </div>

            <div class="bg-white p-10 rounded-xl w-[500px] mb-10 mx-6 shadow-lg">
                <p class="font-kslab text-orange-600 text-lg mb-4">Лингвистика</p>
                <ul role="list" class="list-disc marker:text-black  ml-6">
                    <li>Перевод и международные бизнес-коммуникации</li>
                </ul>
            </div>

            <div class="bg-white p-10 rounded-xl w-[500px] mb-10 mx-6 shadow-lg">
                <p class="font-kslab text-orange-600 text-lg mb-4">Экономика и управление</p>
                <ul role="list" class="list-disc marker:text-black  ml-6">
                    <li>Управление бизнесом и интернет-маркетинг</li>
                    <li>Продюсирование и маркетинг мероприятий</li>
                </ul>
            </div>
        </div>
        
    </div>

</x-app-layout>
