import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './app/Models/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js'
    ],

    theme: {
        extend: {
            fontFamily: {
                inter: ['Inter'],
                kslab: ['Kelly Slab'],
            },
        },
        screens: {
            'xs': '30rem',
            ...defaultTheme.screens,
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
