// Install Service Worker
if ("serviceWorker" in navigator) {
    window.addEventListener("load", () => {
        navigator.serviceWorker
            .register("/serviceworker.js")
            .then((registration) => {
                console.log("ServiceWorker registered: ", registration);
            })
            .catch((registrationError) => {
                console.log(
                    "ServiceWorker registration failed: ",
                    registrationError
                );
            });
    });
}

const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
if ("Notification" in window && "serviceWorker" in navigator) {
    Notification.requestPermission().then((permission) => {
        if (permission === "granted") {
            console.log("Notification permission granted.");
            // Daftarkan service worker jika belum
            navigator.serviceWorker.ready.then((registration) => {
                registration.pushManager
                    .subscribe({
                        userVisibleOnly: true,
                        applicationServerKey: urlBase64ToUint8Array(
                            "BNHNnasVegKlFNPH3PNz-4X731y1zwPrzZ0ZkmB7hjp4zHeNzMBACHsbvkI4ttu_g8LN-Eh3HtCZ8CSeQD2eWF8"
                        ), // Ganti dengan kunci publik VAPID Anda
                    })
                    .then((subscription) => {
                        // Kirim subscription ke server untuk disimpan
                        return fetch("/user/subscribe", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": csrfToken,
                            },
                            body: JSON.stringify(subscription),
                        });
                    })
                    .then(() => {
                        console.log("Subscription saved.");
                    })
                    .catch((err) => {
                        console.error("Failed to subscribe:", err);
                    });
            });
        } else {
            console.log("Notification permission denied.");
        }
    });
}

// Fungsi untuk mengonversi VAPID key ke Uint8Array
function urlBase64ToUint8Array(base64String) {
    const padding = "=".repeat((4 - (base64String.length % 4)) % 4);
    const base64 = (base64String + padding)
        .replace(/-/g, "+")
        .replace(/_/g, "/");
    const rawData = window.atob(base64);
    const outputArray = new Uint8Array(rawData.length);
    for (let i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}

self.addEventListener("push", function (event) {
    console.log("Push received:", event);

    if (event.data) {
        const data = event.data.json();
        console.log("Push data:", data);

        const options = {
            body: data.body,
            icon: "/images/icons/volhub-192x192.png", // Sesuaikan dengan ikon Anda
        };

        event.waitUntil(
            self.registration.showNotification(data.title, options)
        );
    } else {
        console.log("No push data available.");
    }
});

function shortlistApplicant(id) {
    fetch(`/shortlist/${id}`, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
            "Content-Type": "application/json",
        },
        body: JSON.stringify({}),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                console.log("Notification sent successfully.");
            } else {
                console.error("Failed to send notification.");
            }
        })
        .catch((error) => console.error("Error:", error));
}
