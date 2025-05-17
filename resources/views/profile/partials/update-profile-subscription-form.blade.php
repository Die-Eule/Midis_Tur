<section>
    <header>
        <h2 class="text-xl font-medium text-orange-600 font-kslab">
            {{ __('Мои подписки') }}
        </h2>

        <p class="mt-1 text-sm text-gray-900">
            {{ __("Управляйте своими подписками на сайте ") }}
        </p>
    </header>

    <div class="flex flex-wrap gap-4 mt-5">
        @foreach($departments as $item)
            <form method="POST" action="{{ route('subscription.delete', $item->id) }}" class="border border-black rounded-xl px-2 py-1">
                @csrf
                @method('delete')
                <div class="flex gap-2">
                    <p class="text-sm text-gray-900">{{$item->name}}</p>
                    <button type="submit" class="text-xl/4">&times;</button>
                </div>
            </form>
        @endforeach
    </div>

</section>
