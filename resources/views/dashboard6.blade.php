<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center" x-data="{ collection: [], selected: '' }">
        <div class="font-kslab uppercase mt-16 flex justify-center items-center text-3xl text-orange-600">
            <div class="flex flex-col md:flex-row items-center">
                <div>
                    <a href="{{ route('dashboard3', $department->id) }}" class="flex items-center mb-8 md:mb-0">
                        <div class="w-[32px] h-[32px]"><img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:h-[32px]" alt=""></div>
                        <p class="md:hidden text-base pl-2">Назад</p>
                    </a>
                </div>
                <p class="px-5 md:px-0 text-center">{{$department->name}}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 mt-14 select-none">
            @ifadmin
                <form enctype="multipart/form-data" method="post" action="{{ route('dashboard6.upload', $department->id) }}"
                        >
                    @csrf
                    @method('put')
                    <div class="w-[89vw] h-[57vw] ns:w-[500px] ns:h-[320px] shadow-lg rounded-xl bg-white mb-10 mx-6 flex justify-center items-center cursor-pointer"
                            x-on:click.prevent.stop="$refs.browse.click()">
                        <img src="{{ Vite::asset('resources/images/plus_sign.svg') }}" alt="">
                    </div>
                    <input type="file" accept="image/*" name="new_photo" class="hidden" x-ref="browse"
                        x-on:change="$refs.submit.click()">
                    <button type="submit" class="hidden" x-ref="submit"></button>
                </form> 
            @endifadmin
            @foreach($gallery as $item)
                <div class="relative w-[89vw] h-[57vw] ns:w-[500px] ns:h-[320px] mb-10 mx-6 cursor-pointer">
                    @ifadmin
                        <div class="absolute w-[89vw] h-[57vw] ns:w-[500px] ns:h-[320px] flex justify-center items-center bg-black/50 opacity-0 hover:opacity-100 duration-500 rounded-xl"
                            id="{{$item->id}}" x-on:click.prevent.stop="selected=$el.id; $dispatch('open-modal', 'del-photo')">
                            <p class="text-5xl font-medium text-orange-500">&#128465;</p>
                        </div>
                    @endifadmin
                    <img src="{{ $item->url }}" alt="" id="{{$loop->index}}"
                        class="w-[89vw] h-[57vw] ns:w-[500px] ns:h-[320px] rounded-xl object-cover"
                        x-init="collection[{{$loop->index}}]=$el.src"
                        x-on:click.prevent.stop="selected=$el.id; if(window.matchMedia('(pointer: fine)').matches) $dispatch('open-modal', 'gallery');">
                </div>
            @endforeach
        </div>

        @ifadmin

            <x-modal name="del-photo" maxWidth="lg">
                <form method="post" action="{{ route('dashboard6.remove') }}"
                        class="flex flex-col items-center p-10 gap-5">
                    @csrf
                    @method('delete')
                    <input name="photo_id" type="hidden" :value="selected">
                    <p class="text-center">Вы уверены, что хотите удалить данное изображение из списка?</p>
                    <div class="w-[45%] flex justify-between items-center">
                        <button class="w-20 rounded-2xl py-4 bg-orange-600 inline-flex justify-center items-center px-4 border border-transparent font-semibold text-xs text-white tracking-widest hover:bg-gray-200 hover:text-orange-600 focus:bg-gray-700 transition ease-in-out duration-150"
                            type="submit">{{ __('Да') }}</button>
                        <button class="w-20 rounded-2xl py-4 bg-orange-600 inline-flex justify-center items-center px-4 border border-transparent font-semibold text-xs text-white tracking-widest hover:bg-gray-200 hover:text-orange-600 focus:bg-gray-700 transition ease-in-out duration-150"
                            x-on:click.prevent.stop="$dispatch('close')">{{ __('Нет') }}</button>
                    </div>
                </form> 
            </x-modal>

        @else

            <x-modal-viz name="gallery" maxWidth="7xl">
                <div class="flex justify-between items-center min-h-[95vh] px-5 select-none">
                    <div class="w-[20px] cursor-pointer" x-on:click="selected > 0 ? selected-- : null">
                        <img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:w-[20px]" alt="">
                    </div>
                    <img :src="collection[selected]" alt="" class="mx-5 max-w-xl md:max-w-2xl xl:max-w-6xl max-h-[94vh]">
                    <div class="w-[20px] cursor-pointer" x-on:click="selected < {{ $gallery->count() - 1 }} ? selected++ : null">
                        <img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:w-[20px] -scale-x-100" alt="">
                    </div>
                </div>
            </x-modal-viz>
        
        @endifadmin

</x-app-layout>
