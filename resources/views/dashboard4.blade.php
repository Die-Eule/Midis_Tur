@php
    $fields = ['surname' => 'Фамилия', 'name' => 'Имя', 'middlename' => 'Отчество', 'position' => 'Должность'];
@endphp

<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center" x-data="{ selected: 0, photos: {}}">
        <div class="font-kslab uppercase mt-8 md:mt-16 flex flex-col justify-center items-center text-3xl text-orange-600">
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

        @ifadmin
            <script>
                var collection = {{ Js::from($staff) }};
            </script>
        @endifadmin

        <div class="flex flex-col xl:flex-row xl:flex-wrap justify-between items-ceneter xl:w-[900px] mt-14">
            @ifadmin
                <div class="w-[78vw] h-[108vw] xs:w-[375px] xs:h-[520px] shadow-lg rounded-xl bg-white mb-8 flex justify-center items-center cursor-pointer"
                    x-on:click.prevent="$dispatch('open-modal', 'add-person')">
                    <img src="{{ Vite::asset('resources/images/plus_sign.svg') }}" alt=""
                        x-init="photos[{{$staff->count()}}]=$el.src; collection[{{$staff->count()}}]={id: 0}; collection[{{$staff->count()}}].name='';
                                collection[{{$staff->count()}}].surname=''; collection[{{$staff->count()}}].middlename=''">
                </div>
            @endifadmin
            @foreach($staff as $persone)
            <div x-on:click.prevent="selected={{$loop->index}}; $dispatch('open-modal', 'person')"
                    @class(["w-[78vw] xs:w-[375px] mb-8", "cursor-pointer" => Auth::user() && Auth::user()->isAdmin()])>
                <img src="{{$persone->url }}" alt="" class="w-full h-[108vw] xs:h-[520px] shadow-lg rounded-xl object-cover"
                    x-init="photos[{{$loop->index}}]=$el.src">
                <p class="font-kslab text-orange-600 text-lg mt-4">{{$persone->surname.' '.$persone->name.' '.$persone->middlename}}</p>
                <p>{{$persone->position}}</p>
            </div>
            @endforeach
        </div>

        @ifadmin

            <x-modal-viz name="person" maxWidth="4xl" bg="bg-white" strict>
                <form enctype="multipart/form-data" method="post" action="{{ route('dashboard4.update') }}" class="p-5"
                        x-on:clear-form="old=selected; selected={{$staff->count()}}; selected=old">
                    @csrf
                    @method('patch')
                    <div class="w-full h-[520px] flex justify-between items-start gap-5">
                        <x-photo-input width="w-[375px]" hight="h-[520px]" initial="photos[selected]"/>
                        <div class="h-full grow flex flex-col justify-between items-end px-5">
                            <div class="w-full space-y-5">
                                @foreach ($fields as $iKey => $label)
                                    <div>
                                        <label for="{{$iKey}}">{{$label}}</label>
                                        <input id="{{$iKey}}" name="{{$iKey}}" type="text" :value="collection[selected].{{$iKey}}" required autocomplete="off"
                                            class="block w-full border-black-300 hover:border-orange-300 focus:border-orange-600 focus:ring-orange-500 rounded-xl shadow-sm bg-gray-100">
                                    </div>
                                @endforeach
                                <div>
                                    <input type="hidden" name="teacher_id" :value="collection[selected].id">
                                </div>
                            </div>
                            <div class="w-full flex justify-end items-end gap-5">
                                <button class="w-30 rounded-2xl py-4 bg-orange-600 inline-flex justify-center items-center px-4 border border-transparent text-white tracking-widest hover:bg-gray-200 hover:text-orange-600 focus:bg-gray-700 transition ease-in-out duration-150"
                                    x-on:click.prevent.stop="$dispatch('close'); $dispatch('clear-form')">{{ __('Отмена') }}</button>
                                <button class="w-30 rounded-2xl py-4 bg-orange-600 inline-flex justify-center items-center px-4 border border-transparent text-white tracking-widest hover:bg-gray-200 hover:text-orange-600 focus:bg-gray-700 transition ease-in-out duration-150"
                                    type="submit">{{ __('Изменить') }}</button>
                                <p class="text-5xl font-medium text-orange-600 ml-5 cursor-pointer" x-on:click.prevent.stop="$dispatch('open-modal', 'del-person')">&#128465;</p>
                            </div>
                        </div>
                    </div>
                </form> 
            </x-modal-viz>

            <x-modal-viz name="add-person" maxWidth="4xl" bg="bg-white" strict>
                <form enctype="multipart/form-data" method="post" action="{{ route('dashboard4.add', $department->id) }}" class="p-5"
                        x-on:clear-form="$el.reset(); $refs.preview.src=photos[{{$staff->count()}}];">
                    @csrf
                    @method('put')
                    <div class="w-full h-[520px] flex justify-between items-start gap-5">
                        <x-photo-input width="w-[375px]" hight="h-[520px]" initial="photos[{{$staff->count()}}]" newMode="true"/>
                        <div class="h-full grow flex flex-col justify-between items-end px-5">
                            <div class="w-full space-y-5">
                                @foreach ($fields as $iKey => $label)
                                    <div>
                                        <label for="{{$iKey}}">{{$label}}</label>
                                        <input id="{{$iKey}}" name="{{$iKey}}" type="text" value="" required autocomplete="off"
                                            class="block w-full border-black-300 hover:border-orange-300 focus:border-orange-600 focus:ring-orange-500 rounded-xl shadow-sm bg-gray-100">
                                    </div>
                                @endforeach
                            </div>
                            <div class="w-full flex justify-end items-end gap-5">
                                <button class="w-40 rounded-2xl py-4 bg-orange-600 inline-flex justify-center items-center px-4 border border-transparent text-white tracking-widest hover:bg-gray-200 hover:text-orange-600 focus:bg-gray-700 transition ease-in-out duration-150"
                                    x-on:click.prevent.stop="$dispatch('close'); $dispatch('clear-form')">{{ __('Отмена') }}</button>
                                <button class="w-40 rounded-2xl py-4 bg-orange-600 inline-flex justify-center items-center px-4 border border-transparent text-white tracking-widest hover:bg-gray-200 hover:text-orange-600 focus:bg-gray-700 transition ease-in-out duration-150"
                                    type="submit">{{ __('Добавить') }}</button>
                            </div>
                        </div>
                    </div>
                </form> 
            </x-modal-viz>

            <x-modal name="del-person" maxWidth="lg">
                <form method="post" action="{{ route('dashboard4.remove') }}"
                        class="flex flex-col items-center p-10 gap-5">
                    @csrf
                    @method('delete')
                    <input name="teacher_id" type="hidden" :value="collection[selected].id">
                    <p class="text-center">Вы уверены, что хотите удалить данного педагога из списка?</p>
                    <div class="w-[45%] flex justify-between items-center">
                        <button class="w-20 rounded-2xl py-4 bg-orange-600 inline-flex justify-center items-center px-4 border border-transparent font-semibold text-xs text-white tracking-widest hover:bg-gray-200 hover:text-orange-600 focus:bg-gray-700 transition ease-in-out duration-150"
                            type="submit">{{ __('Да') }}</button>
                        <button class="w-20 rounded-2xl py-4 bg-orange-600 inline-flex justify-center items-center px-4 border border-transparent font-semibold text-xs text-white tracking-widest hover:bg-gray-200 hover:text-orange-600 focus:bg-gray-700 transition ease-in-out duration-150"
                            x-on:click.prevent.stop="$dispatch('close')">{{ __('Нет') }}</button>
                    </div>
                </form> 
            </x-modal>

        @endifadmin
    </div>

</x-app-layout>
