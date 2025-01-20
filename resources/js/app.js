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
                            "YOUR_VAPID_PUBLIC_KEY"
                        ), // Ganti dengan kunci publik VAPID Anda
                    })
                    .then((subscription) => {
                        // Kirim subscription ke server untuk disimpan
                        return fetch("/save-subscription", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
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
