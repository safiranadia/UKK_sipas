/** @type {import('tailwindcss').Config} */

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/*.jsx",
        "./resources/**/*.tsx",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#004F99",
                light: "#FFFFFF",
                secondary: "#F0F1F4",
                success: "#08CB00",
                warning: "#FAB95B",
                danger: "#ED322C",
            },
        },
    },
    plugins: [],
};
