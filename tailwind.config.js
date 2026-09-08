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
                    page: '#F4F0EA',
                    surface: '#FFFCF7',
                    elevated: '#EEE6DB',
                    primary: '#A34A3E',
                    secondary: '#7E3D55',
                    accent: '#B7791F',
                    teal: '#2F6F6B',
                    text: '#2D2926',
                    body: '#554E47',
                    muted: '#746D64',
                },
            },
            fontFamily: {
                sans: ['DM Sans', 'Noto Sans Thai', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
