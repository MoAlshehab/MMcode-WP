/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php",
    "./**/*.js",
    "./**/*.jsx",
    "./src/**/*.css",
  ],
 theme: {
    extend: {
      colors: {
        primary: "#dc2626",
        dark: "#0a0a0a",
      },
    },
  },
};