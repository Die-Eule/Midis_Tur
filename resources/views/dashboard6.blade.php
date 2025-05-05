<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center">
        <div class="font-kslab uppercase mt-16 flex justify-center items-center text-3xl text-orange-600">
            <a href="{{url()->previous()}}" class="pr-8"><img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:h-[32pxresources/views/dashboard4.blade.php]" alt=""></a>
            <p>{{$department->name}}</p>
        </div>

        <div class="xl:columns-2 mt-14">
            @foreach($gallery as $item)
                <img src="{{ Vite::asset('resources/images/'.$item->path) }}" alt="" class="w-[500px] h-[320px] shadow-lg rounded-xl object-cover mb-10 mx-6">
            @endforeach
        </div>

</x-app-layout>
