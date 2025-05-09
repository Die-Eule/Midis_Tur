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

        <div class="xl:columns-2 mt-14">
            @foreach($projects as $proj)
                <div class="mb-8 break-inside-avoid-column">
                    @php
                        list($img_w, $img_h) = getimagesize(resource_path('images/'.$gallery[$proj->id]->first()->path));
                        $img_fit = $img_w < $img_h ? 'object-contain' : 'object-cover';
                    @endphp
                    <img src="{{ Vite::asset('resources/images/'.$gallery[$proj->id]->first()->path) }}" alt=""
                        class="w-[500px] h-[320px] shadow-lg rounded-xl {{$img_fit}} bg-stone-700 mb-3 mx-6">
                    <p class="w-[500px] mt-2 mx-6">{{$proj->description}}</p>
                </div>
            @endforeach
        </div>

</x-app-layout>
