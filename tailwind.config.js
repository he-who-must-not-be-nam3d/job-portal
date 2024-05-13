/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            keyframes: {
                "open-menu": {
                    "0%": { transform: "scaleY(0)" },
                    "70%": { transform: "scaleY(1.2)" },
                    "100%": { transform: "scaleY(1)" },
                },
            },
            animation: {
                "open-menu": "open-menu 0.7s ease-in-out forwards",
            },
        },
    },
    plugins: [],
};
