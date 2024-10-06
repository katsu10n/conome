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
        IBM: ['IBMPlexSansJP', 'sans-serif'],
      },

      colors: {
        bc: '#fff',
        main: {
          DEFAULT: '#FF6600',
          light: '#ff983f',
          dark: '#ff4d00',
        },
        sub: {
          DEFAULT: '#ffcc00',
        },
        text: {
          DEFAULT: '#1d1f21',
          light: '#444648',
        },
        gray: {
          DEFAULT: '#cccccc',
          light: '#f5f5f5',
          dark: '#929292',
        },
      },
    },
  },

  plugins: [forms],
};
