import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'black': '#000112',
                'very-black': '#20212C',
                'dark-grey': '#2B2C37',
                'dark-lines': '#3E3F4E',
                'medium-grey': '#828FA3',
                'lines': '#E4EBFA',
                'light-grey': '#F4F7FD',
                'purple': '#635FC7',
                'purple-light': '#A8A4FF',
                'red': '#EA5555',
                'red-light': '#FF9898'
            }
        },
    },
    plugins: [],
};
