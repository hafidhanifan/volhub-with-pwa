module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                button_hover : "#5aa6cf40",
            },
            width: {
                "7/10": "70%",
                "3/10": "30%",
            },
            fontFamily: {
                sans: ["Poppins", "sans-serif"],
            },
        },
    },
    plugins: [
        require("@tailwindcss/line-clamp"),
        require("@tailwindcss/forms"),
    ],
};
