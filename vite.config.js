import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css", // Sesuaikan dengan path file CSS
                "resources/js/app.js", // Sesuaikan dengan path file JS
                "resources/css/bootstrap.min.css",
                "resources/css/lineicons.css",
                "resources/css/materialdesignicons.min.css",
                "resources/css/fullcalendar.css",
                "resources/css/mitra.css",
                "resources/css/main.css",
                "resources/css/style.css",
                "resources/css/responsive.css",
                "resources/css/userProfile.css",
                "resources/js/bootstrap.bundle.min.js",
                "resources/js/Chart.min.js",
                "resources/js/dynamic-pie-chart.js",
                "resources/js/moment.min.js",
                "resources/js/fullcalendar.js",
                "resources/js/jvectormap.min.js",
                "resources/js/world-merc.js",
                "resources/js/polyfill.js",
                "resources/js/main.js",
                "resources/js/mitra.js",
                "resources/js/userProfile.js",
                "resources/js/user-fix.js",
                "resources/js/mitra-fix.js",
            ],
            refresh: true, // Mengaktifkan fitur auto-refresh saat save
        }),
    ],
    server: {
        host: "localhost",
        hmr: {
            host: "localhost",
        },
        proxy: {
            "/api": {
                target: "http://localhost:8000", // Proxy ke Laravel
                changeOrigin: true,
                secure: false,
            },
        },
        sourcemapIgnoreList: [/\.min\.js$/],
    },
});
