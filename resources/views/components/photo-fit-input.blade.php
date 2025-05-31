@props([
    'name' => 'new_photo',
    'width',
    'hight',
    'initial',
    'newMode' => 'false',
    'required' => false,
])

<div class="cursor-pointer">
    <img :src="{{$initial}}" alt=""
        x-on:load="
            classes = '{{$width}} {{$hight}} shadow-lg rounded-xl ';
            if ({{$newMode}} && $el.src==={{$initial}}) { $el.className = classes + 'object-none' }
            else if ($event.target.naturalWidth < $event.target.naturalHeight) { $el.className = classes + 'object-contain' }
            else { $el.className = classes + 'object-cover' }"
        x-on:click.prevent.stop="$refs.browse.click()" x-ref="preview">
    <input type="file" accept="image/*" name="{{$name}}" class="hidden" x-ref="browse"
        x-on:change="$refs.preview.src=URL.createObjectURL($event.target.files[0]);">
</div>
