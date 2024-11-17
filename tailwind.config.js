import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brown: {
                    700: '#8b5e34',
                    800: '#6b4226',
                    900: '#5a3520',
                },
            },
            backgroundColor: {
                brown: {
                    700: '#A88952',
                    800: '#B2935B'
                }
            }
        },
    },

    plugins: [require('daisyui'), forms, require('flowbite/plugin')],
};
