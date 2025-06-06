<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center" x-data="{ lslide: true, allDirs: {}, allSpecs: {}, new_count: 1, selected: '' }">
        <div class="font-kslab uppercase mt-8 md:mt-16 flex flex-col justify-center items-center text-3xl text-orange-600">
            <div class="flex flex-col md:flex-row items-center">
                <div>
                    <a href="{{ route('dashboard') }}" class="flex items-center mb-8 md:mb-0">
                        <div class="w-[32px] h-[32px]"><img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:h-[32px]" alt=""></div>
                        <p class="md:hidden text-base pl-2">Назад</p>
                    </a>
                </div>
                <p class="px-5 md:px-0 text-center">Где вы планируете проходить обучение?</p>
            </div>
            <p class="mt-8 px-5 text-center">Колледж на базе 
                <span class="cursor-pointer" x-on:click="lslide = true" :class="lslide && 'underline'">9&nbsp;классов</span>&nbsp;/&nbsp;<span class="cursor-pointer" x-on:click="lslide = false":class="lslide || 'underline'">11&nbsp;классов</span>
            </p>
        </div>

        <div class="block overflow-x-hidden w-[calc(95vw+1rem)] xs:w-[calc(460px+1rem)] sm:w-[calc(500px+3rem)] xl:w-[calc(1000px+7rem)]">
            <div class="w-full flex duration-1000" :class="lslide || 'ml-[calc(-95vw-1rem)] xs:ml-[calc(-460px-1rem)] sm:ml-[calc(-500px-3rem)] xl:ml-[calc(-1000px-7rem)]'">
                <div class="xl:columns-2 mt-14">
                    @foreach($directions['1'] as $direction)
                        <x-spec-card :direction=$direction :specialties=$specialties></x-card>
                    @endforeach
                </div>

                <div class="xl:columns-2 mt-14">
                    @foreach($directions['2'] as $direction)
                        <x-spec-card :direction=$direction :specialties=$specialties></x-card>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="font-kslab uppercase flex flex-col justify-center items-center text-3xl text-orange-600">
            <p class="mt-8">Институт</p>
        </div>

        <div class="xl:columns-2 mt-14">
            @foreach($directions['3'] as $direction)
                <x-spec-card :direction=$direction :specialties=$specialties :fixed="false"></x-card>
            @endforeach
        </div>

        @ifadmin
        <x-modal name="change-directions" focusable>
            <form method="post" action="{{ route('dashboard2.update') }}" class="p-6 w-full">
                @csrf
                @method('patch')

                <div class="flex flex-col space-y-1">
                    <div class="w-full mb-3">
                        <input name="direction" type="hidden" :value="selected">
                        <input name="title" type="text" :value="allDirs[selected]" required autocomplete="off"
                            class="block w-full border-black-300 hover:border-orange-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm">
                    </div>

                    <template x-for="(value, index) in allSpecs[selected]" :key="index">
                        <div class="flex gap-1">
                            <input :name="index" type="text" :value="value" autocomplete="off"
                                class="block w-full border-black-300 hover:border-orange-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm">
                            <x-secondary-button x-on:click="delete allSpecs[selected][index]"><span class="text-2xl/4 text-red-800">&#128465;</span></x-secondary-button>
                        </div>
                    </template>

                    <div class="w-full flex justify-end items-center gap-4 pt-2">
                        <x-secondary-button x-on:click="allSpecs[selected]['new_'+new_count]=''; new_count++"><p class="text-xl">+</p></x-secondary-button>
                        <div class="grow"></div>
                        <x-secondary-button x-on:click="window.location='{{ route('dashboard2') }}'">{{ __('К исходным') }}</x-secondary-button>
                        <x-primary-button>{{ __('Сохранить') }}</x-primary-button>
                    </div>
                </div>

            </form>
        </x-modal>
        @endifadmin
        
    </div>

</x-app-layout>
