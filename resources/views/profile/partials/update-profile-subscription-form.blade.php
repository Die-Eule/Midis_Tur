<section>
    <header>
        <h2 class="text-xl font-medium text-orange-600 font-kslab">
            {{ __('Мои подписки') }}
        </h2>

        <p class="mt-1 text-sm text-gray-900">
            {{ __("Управляйте своими подписками на сайте ") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

</section>
