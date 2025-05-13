<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center" x-data="{ collection: [], selected: '' }">
        <div class="font-kslab uppercase mt-16 flex justify-center items-center text-3xl text-orange-600">
            <div class="w-[32px] h-[32px]">
                <a href="{{ route('dashboard3', $department->id) }}" class="pr-8">
                    <img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:h-[32px]" alt="">
                </a>
            </div>
            <p>{{$department->name}}</p>
        </div>

        <div class="xl:columns-2 mt-14">
            @foreach($gallery as $item)
                <img src="{{ Vite::asset('resources/images/'.$item->path) }}" alt="" id="{{$loop->index}}"
                    class="w-[500px] h-[320px] shadow-lg rounded-xl object-cover mb-10 mx-6"
                    x-init="collection[{{$loop->index}}]='{{ Vite::asset('resources/images/'.$item->path) }}'"
                    x-on:click.prevent="selected=$el.id; $dispatch('open-modal', 'gallery')">
            @endforeach
        </div>

        <x-modal-viz name="gallery" maxWidth="7xl">
            <div class="flex justify-center items-center min-h-[95vh]">
                <div class="w-[20px]" x-on:click="selected > 0 ? selected-- : null">
                    <img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:w-[20px]" alt="">
                </div>
                <img :src="collection[selected]" alt="" class="mx-5 sm:max-w-6xl max-h-[94vh]">
                <div class="w-[20px]" x-on:click="selected < {{ $gallery->count() - 1 }} ? selected++ : null">
                    <img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:w-[20px] -scale-x-100" alt="">
                </div>
            </div>
        </x-modal-viz>

</x-app-layout>
