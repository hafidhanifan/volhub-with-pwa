const CACHE_NAME = "pwa-cache-v1";
const urlsToCache = [
    "/",
    // "/offline",
    "/build/assets/app-BuWhUq6L.css", // Sesuaikan dengan output Tailwind Anda
    "/build/assets/app-Dp8K0SpU.js", // Sesuaikan dengan output JS Anda
];

self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(urlsToCache);
        })
    );
});

self.addEventListener("fetch", (event) => {
    event.respondWith(
        caches.match(event.request).then((response) => {
            return response || fetch(event.request);
        })
    );
});

self.addEventListener("activate", (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) =>
            Promise.all(
                cacheNames.map((cache) => {
                    if (cache !== CACHE_NAME) {
                        return caches.delete(cache);
                    }
                })
            )
        )
    );
});
