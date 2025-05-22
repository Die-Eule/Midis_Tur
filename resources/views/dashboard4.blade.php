@php
    $fields = ['surname' => 'Фамилия', 'name' => 'Имя', 'middlename' => 'Отчество', 'position' => 'Должность'];
@endphp

<x-app-layout>

    <!--Body-->
    <div class="w-full h-full flex flex-col items-center" x-data="{ selected: 0, photos: {}}">
        <div class="font-kslab uppercase mt-16 flex justify-center items-center text-3xl text-orange-600">
            <div class="w-[32px] h-[32px]">
                <a href="{{ route('dashboard3', $department->id) }}" class="pr-8">
                    <img src="{{ Vite::asset('resources/images/arrow.svg') }}" class="hover:h-[32px]" alt="">
                </a>
            </div>
            <p>{{$department->name}}</p>
        </div>

        @ifadmin(Auth::user())
            <script>
                var collection = {{ Js::from($staff) }};
            </script>
        @endifadmin

        <div class="flex flex-wrap justify-between w-[450px] xl:w-[900px] mt-14">
            @ifadmin(Auth::user())
                <div class="w-[375px] h-[520px] shadow-lg rounded-xl bg-white mb-8 flex justify-center items-center cursor-pointer"
                    x-on:click.prevent="$dispatch('open-modal', 'add-person')">
                    <img src="{{ Vite::asset('resources/images/plus_sign.svg') }}" alt="" x-init="photos[{{$staff->count()}}]=$el.src">
                </div>
            @endifadmin
            @foreach($staff as $persone)
            <div class="mb-8 cursor-pointer" x-on:click.prevent="selected={{$loop->index}}; $dispatch('open-modal', 'person')">
                <img src="{{ Vite::asset($persone->pic) }}" alt="" class="w-[375px] h-[520px] shadow-lg rounded-xl object-cover"
                    x-init="photos[{{$loop->index}}]=$el.src">
                <p class="font-kslab text-orange-600 text-lg mt-4">{{$persone->surname.' '.$persone->name.' '.$persone->middlename}}</p>
                <p class="w-[375px]">{{$persone->position}}</p>
            </div>
            @endforeach
        </div>

        @ifadmin(Auth::user())

            <x-modal-viz name="person" maxWidth="4xl" bg="bg-white">
                <form enctype="multipart/form-data" method="post" action="{{ route('dashboard4.update') }}" class="p-5">
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
                                    x-on:click.prevent.stop="$dispatch('close')">{{ __('Отмена') }}</button>
                                <button class="w-30 rounded-2xl py-4 bg-orange-600 inline-flex justify-center items-center px-4 border border-transparent text-white tracking-widest hover:bg-gray-200 hover:text-orange-600 focus:bg-gray-700 transition ease-in-out duration-150"
                                    type="submit">{{ __('Изменить') }}</button>
                                <p class="text-5xl font-medium text-orange-600 ml-5 cursor-pointer" x-on:click.prevent.stop="$dispatch('open-modal', 'del-person')">&#128465;</p>
                            </div>
                        </div>
                    </div>
                </form> 
            </x-modal-viz>

            <x-modal-viz name="add-person" maxWidth="4xl" bg="bg-white">
                <form enctype="multipart/form-data" method="post" action="{{ route('dashboard4.add', $persone->department_id) }}" class="p-5">
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
                                    x-on:click.prevent.stop="$dispatch('close')">{{ __('Отмена') }}</button>
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
