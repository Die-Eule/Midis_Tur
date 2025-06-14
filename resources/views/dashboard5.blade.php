<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center"
            x-data="{ selected: '1', slide: 0,
                        collection: {{ Js::from($gallery) }},
                        projects: {},
                        titles: {},
                        forDelete: {},
                        placeholder: '{{ Vite::asset('resources/images/plus_sign.svg') }}' }">
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

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 mt-14">
            @ifadmin
                <div class="w-[89vw] h-[57vw] ns:w-[500px] ns:h-[320px] shadow-lg rounded-xl bg-white mb-10 mx-6 flex justify-center items-center cursor-pointer"
                    x-init="titles['new']={url:placeholder,alignment:'object-none'}; collection['new']=[]; projects['new']={autor:'',grade:'1',year:'1'};"
                    x-on:click.stop="selected='new'; $dispatch('open-modal', 'project')">
                    <img :src="placeholder" alt="">
                </div>
            @endifadmin
            @foreach($projects as $proj)
                <div class="mb-8 cursor-pointer">
                    <img src="{{ $gallery[$proj->id]->first()->url }}" alt="" id="{{$proj->id}}"
                        class="w-[89vw] h-[57vw] ns:w-[500px] ns:h-[320px] shadow-lg rounded-xl {{$gallery[$proj->id]->first()->alignment}} bg-stone-700 mb-3 mx-6"
            @ifadmin
                        x-init="titles[{{$proj->id}}]=collection[{{$proj->id}}].splice(0, 1)[0];
                                projects[{{$proj->id}}]={{ Js::from($proj) }};
                                forDelete[{{$proj->id}}]=[];"
            @endifadmin
                        x-on:click.stop="selected=$el.id; slide=0; $dispatch('open-modal', 'project')">
                    <p class="w-[89vw] ns:w-[500px] mt-2 mx-6">Автор работы: {{$proj->author}}, {{$proj->year}} курс {{$proj->grade == 1 ? 'колледжа' : 'института'}}</p>
                </div>
            @endforeach
        </div>

        @ifadmin
        <div x-data="{ curr_inp: 0, dop_count: 0, to_del: 0, backup: [] }"
            x-on:del-input="
                if ('id' in collection[selected][to_del]) { forDelete[selected].push(collection[selected][to_del].id); }
                collection[selected].splice(to_del, 1);
                dop_count--;
                to_del=0;">
            <x-modal-viz name="project" maxWidth="md" bg="bg-white" focusable strict>
                <form enctype="multipart/form-data" method="post" action="{{ route('dashboard5.add', $department->id) }}" class="p-10 relative" x-data="{baloon: false}"
                        x-on:submit.prevent="if (selected=='new' && $refs.browse.value=='') {baloon=true} else {$el.submit()}"
                        x-on:clear-form="
                            curr_inp=0; dop_count=0; dop_count[selected]=[]; forDelete[selected]=[];
                            collection[selected]=[...backup];
                            selected = (selected=='new') ? Object.keys(titles)[0] : 'new';"
                        x-init="$watch('show', value => { if (value) {dop_count=collection[selected].length; backup=[...collection[selected]];} } )">
                    <p x-show="baloon" class="absolute inset-x-[60px] top-[60px] text-lg text-red-500 text-center bg-gray-200 shadow-lg rounded-xl"  x-on:click.outside="baloon=false">
                        Для карточки работы обязательно должна быть выбрана обложка!
                    </p>
                    @csrf
                    @method('put')
                    <div class="w-full flex flex-col items-center gap-5">
                        <input type="hidden" name="project_id" :value="selected">
                        <x-photo-fit-input name="title" width="w-[375px]" hight="h-[240px]" initial="titles[selected].url" newMode="(selected=='new')"/>
                        <div class="w-full flex flex-col items-center">
                            <div class="w-full space-y-3">
                                <fieldset class="flex gap-4">
                                    <div class="flex items-center gap-1">
                                        <input type="radio" id="college" name="grade" value="1" :checked="projects[selected].grade == 1"/>
                                        <label for="college">Колледж</label>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <input type="radio" id="univer" name="grade" value="3" :checked="projects[selected].grade == 3"/>
                                        <label for="univer">Институт</label>
                                    </div>
                                </fieldset>
                                <fieldset class="flex gap-4">
                                    @for ($year = 1; $year <= 4; $year++)
                                        <div class="flex items-center gap-1">
                                            <input type="radio" id="year-{{$year}}" name="year" value="{{$year}}" :checked="projects[selected].year == {{$year}}" />
                                            <label for="year-{{$year}}">{{$year}} курс</label>
                                        </div>
                                    @endfor
                                </fieldset>
                                <div>
                                    <label for="author">Автор</label>
                                    <input id="author" name="author" type="text" :value="projects[selected].author" placeholder="Фамилия Имя" required autofocus autocomplete="off"
                                        class="block w-full border-black-300 hover:border-orange-300 focus:border-orange-600 focus:ring-orange-500 rounded-xl shadow-sm bg-gray-100 placeholder:text-gray-500 placeholder:italic">
                                </div>
                            </div>
                        </div>
                        <div class="self-end w-full">
                            <p class="text-md text-orange-600 mb-2 w-full text-end border-b border-gray-500">Дополнительные фото</p>
                            <div class="flex flex-row justify-end h-[40px]" :class="{ 'mr-2': dop_count >= 7 }">
                                <template x-for="(value, index) in forDelete[selected]" :key="index">
                                    <div class="">
                                        <input type="hidden" :name="'del_photo'+index" :value="value">
                                    </div>
                                </template>
                                <template x-for="(value, index) in collection[selected]" :key="index">
                                    <div class="">
                                        <img :src="value['url']" alt="" :id="'src'+index"
                                            class="w-[40px] h-[40px] mr-2 object-cover cursor-pointer hidden" :class="{'hidden': collection[selected][index]['hidden']}"
                                            x-init="if ('id' in value) { collection[selected][index]['hidden'] = 0; }"
                                            x-on:click="$dispatch('pic-to-delete', collection[selected][index]['url']); to_del=index; $dispatch('open-modal', 'del-dop');">
                                        <input type="file" accept="image/*" :name="'dop_photo'+index" class="hidden" :id="'inp'+index"
                                            x-on:change="collection[selected][curr_inp]['url'] = URL.createObjectURL($event.target.files[0]);
                                                         collection[selected][curr_inp]['hidden'] = 0;
                                                         $el.previousElementSibling.src=collection[selected][curr_inp]['url'];
                                                         dop_count++;">
                                    </div>
                                </template>
                                <button class="rounded-xl shadow-lg ml-4" x-ref="plus_button" x-show="dop_count < 7" x-on:click.prevent.stop="
                                        curr_inp=collection[selected].length;
                                        collection[selected][curr_inp]={'url': placeholder};
                                        collection[selected][curr_inp]['hidden'] = 1;
                                        await $nextTick();
                                        document.getElementById('inp'+curr_inp).click();">
                                    <img class="w-[40px] h-[40px] object-none scale-50 hover:scale-75" :src="placeholder" alt="">
                                </button>
                            </div>
                        </div>
                        <div class="w-full flex justify-end items-end gap-5 mt-5">
                            <button class="rounded-2xl py-3 bg-orange-600 inline-flex justify-center items-center px-4 border border-transparent text-white tracking-widest hover:bg-gray-200 hover:text-orange-600 focus:bg-gray-700 transition ease-in-out duration-150"
                                x-on:click.prevent.stop="$dispatch('close'); $dispatch('clear-form')">{{ __('Отмена') }}</button>
                            <button class="rounded-2xl py-3 bg-orange-600 inline-flex justify-center items-center px-4 border border-transparent text-white tracking-widest hover:bg-gray-200 hover:text-orange-600 focus:bg-gray-700 transition ease-in-out duration-150"
                                type="submit" x-text="selected=='new' ? 'Добавить' : 'Изменить'"></button>
                            <p x-show="selected!='new'" class="text-5xl font-medium text-orange-600 ml-5 cursor-pointer" x-on:click.prevent.stop="$dispatch('open-modal', 'del-project')">&#128465;</p>
                        </div>
                    </div>
                </form> 
            </x-modal-viz>

            <x-modal-viz name="del-dop" maxWidth="md" bg="bg-white">
                <div class="flex flex-col items-center p-5">
                    <img class="w-[375px] h-[240px] object-cover" src="{{ Vite::asset('resources/images/logo_service.png') }}" alt=""
                        x-on:pic-to-delete.window="$el.src=$event.detail;">
                    <div class="mt-5 w-[70%] flex justify-between">
                        <button class="rounded-2xl py-3 bg-orange-600 inline-flex justify-center items-center px-4 border border-transparent text-white tracking-widest hover:bg-gray-200 hover:text-orange-600 focus:bg-gray-700 transition ease-in-out duration-150"
                            x-on:click.prevent.stop="$dispatch('close')">{{ __('Закрыть') }}</button>
                        <button class="rounded-2xl py-3 bg-red-600 inline-flex justify-center items-center px-4 border border-transparent text-white tracking-widest hover:bg-gray-200 hover:text-red-600 focus:bg-gray-700 transition ease-in-out duration-150"
                            x-on:click.prevent.stop="$dispatch('close'); $dispatch('del-input');">
                            {{ __('Удалить') }}</button>
                    </div>
                </div>
            </x-modal-viz>

            <x-modal name="del-project" maxWidth="lg">
                <form method="post" action="{{ route('dashboard5.remove') }}"
                        class="flex flex-col items-center p-10 gap-5">
                    @csrf
                    @method('delete')
                    <input name="project_id" type="hidden" :value="selected">
                    <p class="text-center">Вы уверены, что хотите удалить данную работу из списка?</p>
                    <div class="w-[45%] flex justify-between items-center">
                        <button class="w-20 rounded-2xl py-4 bg-orange-600 inline-flex justify-center items-center px-4 border border-transparent font-semibold text-xs text-white tracking-widest hover:bg-gray-200 hover:text-orange-600 focus:bg-gray-700 transition ease-in-out duration-150"
                            type="submit">{{ __('Да') }}</button>
                        <button class="w-20 rounded-2xl py-4 bg-orange-600 inline-flex justify-center items-center px-4 border border-transparent font-semibold text-xs text-white tracking-widest hover:bg-gray-200 hover:text-orange-600 focus:bg-gray-700 transition ease-in-out duration-150"
                            x-on:click.prevent.stop="$dispatch('close')">{{ __('Нет') }}</button>
                    </div>
                </form> 
            </x-modal>
        </div>

        @else

            <x-modal-viz name="project" maxWidth="7xl">
                <div class="flex justify-between finger:justify-center items-center h-[calc(100vh-3rem)]"
                        x-data="{ mobile: window.matchMedia('(pointer: coarse)').matches, touchX: 0, touchY: 0, currX: 0, currY: 0 }"
                        x-on:touchstart="touchX=$event.touches[0].clientX; touchY=$event.touches[0].clientY;"
                        x-on:touchmove="currX=$event.touches[0].clientX; currY=$event.touches[0].clientY;"
                        x-on:touchend= "diffX=touchX-currX; diffY=touchY-currY;
                                                if (Math.abs(diffX) < Math.abs(diffY)) {
                                                    if (Math.abs(diffY) > 100) $dispatch('close');
                                                }">
                    <div class="w-[20px] ml-5 finger:hidden" x-on:click="slide > 0 ? slide-- : null">
                        <img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:w-[20px]" alt="">
                    </div>
                    <template x-if="!mobile">
                        <img :src="collection[selected][slide]['url']" alt=""
                            class="mx-5 max-w-6xl max-h-[94vh] rounded-xl">
                    </template>
                    <template x-if="mobile">
                        <div class="flex gap-4 px-1 overflow-x-auto">
                            <template x-for="(value, index) in collection[selected]" :key="index">
                                <div class="h-[85vh] portrait:w-[90vw] flex-none flex flex-col justify-center">
                                    <img :src="value['url']" alt="" class="landscape:h-[85vh] portrait:w-[90vw] rounded-xl object-contain">
                                </div>
                            </template>
                        </div>
                    </template>
                    <div class="w-[20px] mr-5 finger:hidden" x-on:click="slide < collection[selected].length -1 ? slide++ : null">
                        <img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:w-[20px] -scale-x-100" alt="">
                    </div>
                </div>
            </x-modal-viz>

        @endifadmin

</x-app-layout>
