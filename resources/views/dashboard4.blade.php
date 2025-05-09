<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center">
        <div class="font-kslab uppercase mt-16 flex justify-center items-center text-3xl text-orange-600">
            <div class="w-[32px] h-[32px]">
                <a href="{{ route('dashboard3', $department->id) }}" class="pr-8">
                    <img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:h-[32px]" alt="">
                </a>
            </div>
            <p>{{$department->name}}</p>
        </div>

        <div class="flex flex-wrap justify-between w-[450px] xl:w-[900px] mt-14">
            @foreach($staff as $persone)
            <div class="mb-8">
                <img src="{{ Vite::asset('resources/images/'.$persone->pic) }}" alt="" class="w-[375px] h-[520px] shadow-lg rounded-xl object-cover">
                <p class="font-kslab text-orange-600 text-lg mt-4">{{$persone->surname.' '.$persone->name.' '.$persone->middlename}}</p>
                <p class="w-[375px]">{{$persone->position}}</p>
            </div>
            @endforeach
        </div>

</x-app-layout>
