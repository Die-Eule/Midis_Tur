<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center"
            x-data="{ selected: '1', slide: 0 }">
        <div class="font-kslab uppercase mt-16 flex justify-center items-center text-3xl text-orange-600">
            <div class="w-[32px] h-[32px]">
                <a href="{{ route('dashboard3', $department->id) }}" class="pr-8">
                    <img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:h-[32px]" alt="">
                </a>
            </div>
            <p>{{$department->name}}</p>
        </div>

        <script>
            var collection = {{ Js::from($gallery) }};
        </script>

        <div class="xl:columns-2 mt-14">
            @foreach($projects as $proj)
                <div class="mb-8 break-inside-avoid-column">
                    @php
                        list($img_w, $img_h) = getimagesize(resource_path('images/'.$gallery[$proj->id]->first()->path));
                        $img_fit = $img_w < $img_h ? 'object-contain' : 'object-cover';
                    @endphp
                    <img src="{{ Vite::asset('resources/images/'.$gallery[$proj->id]->first()->path) }}" alt="" id="{{$proj->id}}"
                        class="w-[500px] h-[320px] shadow-lg rounded-xl {{$img_fit}} bg-stone-700 mb-3 mx-6"
                        x-on:click.prevent="selected=$el.id; slide=0; $dispatch('open-modal', 'project')">
                    <p class="w-[500px] mt-2 mx-6">{{$proj->description}}</p>
                </div>
            @endforeach
        </div>

        <x-modal-viz name="project" maxWidth="7xl">
            <div class="flex justify-between items-center min-h-[95vh]">
                <div class="w-[20px] ml-5" x-on:click="slide > 0 ? slide-- : null">
                    <img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:w-[20px]" alt="">
                </div>
                <img :src="'{{ Vite::asset('resources/images/') }}' + collection[selected][slide]['path']" alt=""
                    class="mx-5 max-w-6xl max-h-[94vh] rounded-xl">
                <div class="w-[20px] mr-5" x-on:click="slide < collection[selected].length -1 ? slide++ : null">
                    <img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:w-[20px] -scale-x-100" alt="">
                </div>
            </div>
        </x-modal-viz>

</x-app-layout>
