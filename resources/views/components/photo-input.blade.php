@props([
    'width',
    'hight',
    'initial',
    'newMode' => 'false',
])

<div class="cursor-pointer">
    <img :src="{{$initial}}" alt="" class="{{$width}} {{$hight}} shadow-lg rounded-xl object-cover"
        x-on:load="if ({{$newMode}} && $el.src==={{$initial}}) { $el.classList.remove('object-cover'); $el.classList.add('object-none') }"
        x-on:click.prevent.stop="$refs.browse.click()" x-ref="preview">
    <input type="file" accept="image/*" name="new_photo" class="hidden" x-ref="browse"
        x-on:change="
            $refs.preview.src=URL.createObjectURL($event.target.files[0]);
            if ({{$newMode}}) { $refs.preview.classList.remove('object-none'); $refs.preview.classList.add('object-cover'); }">
</div>
