const CACHE_NAME = "volhub-cache-v1";
const urlsToCache = [
    "/",
    "/build/assets/app-BuWhUq6L.css",
    "/build/assets/app-C-NKBMM9.js",
    "/build/assets/user-fix-BhwnjqK6.js",
    "/build/assets/mitra-fix-CFwqNUXL.js",
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
