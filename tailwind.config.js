import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                stage: {
                    page: '#161422',
                    surface: '#211E33',
                    elevated: '#2B2740',
                    primary: '#5B21B6',
                    secondary: '#A61B45',
                    accent: '#E5B92F',
                    teal: '#006D70',
                    text: '#F7F5FF',
                    body: '#CFC9DE',
                    muted: '#A9A2BA',
                },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
