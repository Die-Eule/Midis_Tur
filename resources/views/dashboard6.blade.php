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
            @if(Auth::check() && Auth::user()->isAdmin())
                <div class="w-[500px] h-[320px] shadow-lg rounded-xl bg-white mb-10 mx-6 flex justify-center items-center cursor-pointer break-inside-avoid-column"
                    x-on:click.prevent="$dispatch('open-modal', 'add-photo')">
                    <img src="{{ Vite::asset('resources/images/plus_sign.svg') }}" alt="">
                </div>
            @endif
            @foreach($gallery as $item)
                <img src="{{ Vite::asset('resources/images/'.$item->path) }}" alt="" id="{{$loop->index}}"
                    class="w-[500px] h-[320px] shadow-lg rounded-xl object-cover mb-10 mx-6"
                    x-init="collection[{{$loop->index}}]='{{ Vite::asset('resources/images/'.$item->path) }}'"
                    x-on:click.prevent="selected=$el.id; $dispatch('open-modal', 'gallery')">
            @endforeach
        </div>

        @if(Auth::check() && Auth::user()->isAdmin())

            <x-modal-viz name="add-photo" maxWidth="2xl" :bg=false>
                <form enctype="multipart/form-data" method="post" action="{{ route('dashboard6.upload', $department->id) }}"
                        class="flex flex-col items-start p-5 gap-3" x-data="{ fileName: '' }">
                    @csrf
                    @method('put')
                    <div class="w-full flex items-center gap-5">
                        <x-secondary-button x-on:click.prevent.stop="$refs.browse.click()">{{ __('Выбрать изображение') }}</x-secondary-button>
                        <p x-text="fileName" class="w-full h-9 p-1 border rounded-sm shadow-sm bg-gray-100"></p>
                    </div>
                    <input required type="file" name="path" class="hidden" x-ref="browse" x-on:change="fileName=$refs.browse.value.split(/\\|\//).pop()">
                    <div class="w-full flex justify-between items-center">
                        <x-secondary-button x-on:click.prevent.stop="$dispatch('close')">{{ __('Отмена') }}</x-secondary-button>
                        <x-primary-button>{{ __('Загрузить') }}</x-primary-button>
                    </div>
                </form> 
            </x-modal-viz>

            <x-modal-viz name="del-photo" maxWidth="7xl">
            </x-modal-viz>

        @else

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
        
        @endif

</x-app-layout>
