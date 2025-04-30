<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center" x-data="{ lslide: true }">
        <div class="font-kslab uppercase mt-16 flex flex-col justify-center items-center text-3xl text-orange-600">
            <p>Где вы планируете проходить обучение?</p>
            <p class="mt-8">Колледж на базе 
                <span class="cursor-pointer" x-on:click="lslide = true" :class="lslide && 'underline'">9 классов</span> / 
                <span class="cursor-pointer" x-on:click="lslide = false":class="lslide || 'underline'">11 классов</span>
            </p>
        </div>

        <div class="block overflow-x-hidden w-[calc(500px+3rem)] xl:w-[calc(1000px+7rem)]">
            <div class="w-full flex duration-1000" :class="lslide || 'ml-[calc(-1000px-7rem)]'">
                <div class="xl:columns-2 mt-14">
                @foreach($directions['1'] as $direction)
                    <div class="bg-white p-10 rounded-xl w-[500px] h-[265px] mb-10 mx-6 shadow-lg break-inside-avoid-column"
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

                <div class="xl:columns-2 mt-14">
                @foreach($directions['2'] as $direction)
                    <div class="bg-white p-10 rounded-xl w-[500px] h-[265px] mb-10 mx-6 shadow-lg break-inside-avoid-column"
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
            <div class="bg-white p-10 rounded-xl w-[500px] mb-10 mx-6 shadow-lg break-inside-avoid-column"
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

</x-app-layout>
