module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                // background: "#f8fafc",
                // primary: "#36BA98",
                // secondary: "#F4A261",
                // tertiary: "#E9C46A",
                blueBackground: "#5aa6cf0d",
                blueBorder: "#5aa6cf40",
                blueText: "#5aa6cf",
                snippet: "#5aa6cf",
                greenBackground: "#95dfcb39",
                greenBorder: "#95dfcb",
                greenText: "#18b087",
                redBackgorund: "#ff00000c",
                redBorder: "#ff000032",
                redBgHoover: "#ff0000be",
                redText: "#ff0000 ",
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
