@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-2xl border-black-300 dark:border-black-700 dark:bg-black-900 dark:text-black-300 hover:border-orange-300 focus:border-orange-600 dark:focus:border-orange-600 focus:ring-orange-500 dark:focus:ring-orange-600 rounded-md shadow-sm']) }}>
