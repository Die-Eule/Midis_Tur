@props([
    'direction',
    'specialties',
    'fixed' => true,
])

<div class="cursor-pointer bg-white py-5 px-5 sm:px-10 rounded-xl w-[95vw] xs:w-[460px] sm:w-[500px] mb-10 mx-2 sm:mx-6 shadow-lg break-inside-avoid-column"
        x-init="allDirs['{{$direction->id}}']='{{$direction->name}}'; allSpecs['{{$direction->id}}']={}"
        x-on:click="window.location='{{ route('dashboard3', $direction->department_id) }}'">
    <div @class(['xl:min-h-[225px]' => $fixed])>
        <p class="font-kslab text-orange-600 text-lg mb-4 overflow-hidden text-ellipsis">{{$direction->name}}</p>
        <ul role="list" class="list-disc marker:text-black ml-6 text-base/5 space-y-2">
        @forelse($specialties->get($direction->id, []) as $specialty)
            <li x-init="allSpecs['{{$specialty->direction_id}}']['{{$specialty->id}}']='{{$specialty->name}}'" class="overflow-hidden text-ellipsis">
                {{$specialty->name}}
            </li>
        @empty
            <p class="text-red-500 text-2xl">Карточка пока не заполнена!</p>
        @endforelse
        </ul>
    </div>
    @ifadmin
        <div class="w-full flex justify-end">
            <x-primary-button id="{{$direction->id}}" x-on:click.prevent.stop="selected=$el.id; $dispatch('open-modal', 'change-directions')">{{ __('Изменить') }}</x-primary-button>
        </div>
    @endifadmin
</div>
