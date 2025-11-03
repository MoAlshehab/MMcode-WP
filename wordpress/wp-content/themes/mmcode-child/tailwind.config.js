/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./**/*.php",             // alle PHP-bestanden in je thema
        "./mmcode-child/patterns/**/*.php",    // alle PHP-bestanden in je patterns map
        "./src/**/*.{js,jsx}",    // voor JS/React bestanden
        "./template-parts/**/*.php",
        "./blocks/**/*.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#e11d48", // jouw merkrode kleur
            },
        },
    },
    plugins: [],
};
