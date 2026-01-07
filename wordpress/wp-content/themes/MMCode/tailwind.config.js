/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./**/*.php",
    "./**/*.js",
    "./**/*.jsx",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#dc2626",
        primaryHover: "#b91c1c",

        bg: "#0a0a0a",
        surface: "#111111",
        surfaceLight: "#1a1a1a",

        textBase: "#e5e5e5",
        textMuted: "#a3a3a3",

        borderBase: "#262626",

        danger: "#dc2626",
        success: "#16a34a",
      },
    },
    fontFamily: {
      bodyFont: ['Bebas', 'sans-serif'],
      menuFont: ['IBM', 'sans-serif'],
    },
  },
  plugins: [],
};
