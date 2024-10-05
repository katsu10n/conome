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
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        bc: '#fff',
        main: '#FBA834',
        mainLight: '#ffb793',
        sub: '#387ADF',
        subLight: '#50C4ED',
        text: '#333',
      },
    },
  },

  plugins: [forms],
};
