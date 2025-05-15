<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center" x-data="{ lslide: true, allDirs: {}, allSpecs: {}, new_count: 1 }">
        <div class="font-kslab uppercase mt-16 flex flex-col justify-center items-center text-3xl text-orange-600">
            <div class='flex items-center'>
                <div class="w-[32px] h-[32px]">
                    <a href="{{ route('dashboard') }}" class="pr-8">
                        <img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:h-[32px]" alt="">
                    </a>
                </div>
                <p>Где вы планируете проходить обучение?</p>
            </div>
            <p class="mt-8">Колледж на базе 
                <span class="cursor-pointer" x-on:click="lslide = true" :class="lslide && 'underline'">9 классов</span> / 
                <span class="cursor-pointer" x-on:click="lslide = false":class="lslide || 'underline'">11 классов</span>
            </p>
        </div>

        <div class="block overflow-x-hidden w-[calc(500px+3rem)] xl:w-[calc(1000px+7rem)]">
            <div class="w-full flex duration-1000" :class="lslide || 'ml-[calc(-1000px-7rem)]'">
                <div class="xl:columns-2 mt-14">
                @foreach($directions['1'] as $direction)
                    <div class="cursor-pointer bg-white py-5 px-10 rounded-xl w-[500px] mb-10 mx-6 shadow-lg break-inside-avoid-column"
                            x-init="allDirs['{{$direction->id}}']='{{$direction->name}}'; allSpecs['{{$direction->id}}']={}"
                            x-on:click="window.location='{{ route('dashboard3', $direction->department_id) }}'">
                        <div class="min-h-[225px]">
                            <p class="font-kslab text-orange-600 text-lg mb-4">{{$direction->name}}</p>
                            <ul role="list" class="list-disc marker:text-black ml-6 text-base/7">
                            @foreach($specialties[$direction->id] as $specialty)
                                <li x-init="allSpecs['{{$specialty->direction_id}}']['{{$specialty->id}}']='{{$specialty->name}}'">
                                    {{$specialty->name}}
                                </li>
                            @endforeach
                            </ul>
                        </div>
                        @if(Auth::check() && Auth::user()->isAdmin())
                            <div class="w-full flex justify-end">
                                <x-primary-button x-on:click.prevent.stop="$dispatch('open-modal', 'change-directions')">{{ __('Изменить') }}</x-primary-button>
                            </div>
                        @endif
                    </div>
                @endforeach
                </div>

                <div class="xl:columns-2 mt-14">
                @foreach($directions['2'] as $direction)
                    <div class="cursor-pointer bg-white p-10 rounded-xl w-[500px] h-[265px] mb-10 mx-6 shadow-lg break-inside-avoid-column"
                            x-on:click="window.location='{{ route('dashboard3', $direction->department_id) }}'">
                        <p class="font-kslab text-orange-600 text-lg mb-4">{{$direction->name}}</p>
                        <ul role="list" class="list-disc marker:text-black ml-6 text-base/7">
                        @foreach($specialties[$direction->id] as $specialty)
                            <li>{{$specialty->name}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endforeach
                </div>
            </div>
        </div>

        <div class="font-kslab uppercase flex flex-col justify-center items-center text-3xl text-orange-600">
            <p class="mt-8">Институт</p>
        </div>

        <div class="xl:columns-2 mt-14">
        @foreach($directions['3'] as $direction)
            <div class="cursor-pointer bg-white p-10 rounded-xl w-[500px] mb-10 mx-6 shadow-lg break-inside-avoid-column"
                    x-on:click="window.location='{{ route('dashboard3', $direction->department_id) }}'">
                <p class="font-kslab text-orange-600 text-lg mb-4">{{$direction->name}}</p>
                <ul role="list" class="list-disc marker:text-black ml-6 text-base/7">
                @foreach($specialties[$direction->id] as $specialty)
                    <li>{{$specialty->name}}</li>
                @endforeach
                </ul>
            </div>
        @endforeach
        </div>

        @if(Auth::check() && Auth::user()->isAdmin())
        <x-modal name="change-directions" focusable>
            <form method="post" action="{{ route('dashboard2.update') }}" class="p-6 w-full">
                @csrf
                @method('patch')

                <div class="flex flex-col space-y-1">
                    <div class="w-full mb-3">
                        <input id="title" name="surname" type="text" :value="allDirs[1]" autocomplete="off"
                            class="block w-full border-black-300 hover:border-orange-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm">
                    </div>

                    <template x-for="(value, index) in allSpecs[1]" :key="index">
                        <div class="flex gap-1">
                            <input :id="index" name="surname" type="text" :value="value" autocomplete="off"
                                class="block w-full border-black-300 hover:border-orange-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm">
                            <x-secondary-button x-on:click="delete allSpecs[1][index]">{{ __('-') }}</x-secondary-button>
                        </div>
                    </template>

                    <div class="w-full flex justify-end items-center gap-4 pt-2">
                        <x-secondary-button x-on:click="allSpecs[1]['new_'+new_count]=''; new_count++">{{ __('+') }}</x-secondary-button>
                        <x-primary-button>{{ __('Изменить') }}</x-primary-button>
                    </div>
                </div>

            </form>
        </x-modal>
        @endif
        
    </div>

</x-app-layout>
