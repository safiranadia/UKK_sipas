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
            fontFamily: {
                sans: ["Inter", "sans-serif"],
            },
            colors: {
                primary: "#004F99",
                light: "#FFFFFF",
                secondary: "#F0F1F4",
                success: "#08CB00",
                warning: "#FAB95B",
                danger: "#ED322C",
            },
            boxShadow: {
                soft: "0 10px 40px -10px rgba(0,0,0,0.08)",
                card: "0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03)",
            },
        },
    },
    plugins: [],
};
