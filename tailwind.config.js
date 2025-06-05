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
            backgroundSize: {
                'fit-hp': 'auto 100%',
                'fit-h': 'auto 100vh',
                'fit-w': '100vw auto',
            },
        },
        screens: {
            'xs': '30rem',
            'ns': '35rem',
            ...defaultTheme.screens,
            'wide': {'raw': '(min-aspect-ratio: 16 / 9)'},
            'hi-ls': {'raw': '(orientation: landscape) and (height > 32rem)'},
            'lo-ls': {'raw': '(orientation: landscape) and (height <= 32rem)'},
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
    darkMode: 'false',
};
