module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
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
                button_hover: "#409cd0",
                button_hover2: "#5aa6cf40",
                button_alert: "#C96868",
                button_alert_hover: "",
                currentStageBorder: "#5aa6cf40",
                currentStageBg: "#5aa6cf0d",
                currentStageBorderHover: "#5aa6cf40",
                currentStageFont: "#5aa6cf",
            },
            width: {
                "7/10": "70%",
                "3/10": "30%",
            },
            screens: {
                xs: "500px",
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
