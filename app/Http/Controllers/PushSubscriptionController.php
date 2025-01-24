<?php

namespace App\Http\Controllers;

use App\Models\PushSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PushSubscriptionController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'endpoint' => 'required|string',
            'keys.p256dh' => 'required|string',
            'keys.auth' => 'required|string',
        ]);

        // Simpan data ke tabel push_subscriptions
        $subscription = PushSubscription::updateOrCreate(
            ['endpoint' => $validated['endpoint']],
            [
                'user_id' => auth()->id(),
                'endpoint' => $validated['endpoint'],
                'p256dh' => $validated['keys']['p256dh'],
                'auth' => $validated['keys']['auth'],
            ]
        );

        return response()->json(['success' => true, 'subscription' => $subscription]);
    }

    public function notify(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        $subscriptions = PushSubscription::where('user_id', auth()->id())->get();

        foreach ($subscriptions as $subscription) {
            // Format payload untuk push notification
            $payload = json_encode([
                'title' => $validated['title'],
                'body' => $validated['body'],
            ]);

            // Kirim push notification
            $this->sendPushNotification($subscription, $payload);
        }

        return response()->json(['success' => true]);
    }

    private function sendPushNotification($subscription, $payload)
    {
        // Implementasi push notification menggunakan library seperti Minishlink/web-push
        // Dokumentasi: https://github.com/web-push-libs/web-push-php

        $webPush = new \Minishlink\WebPush\WebPush([
            'VAPID' => [
                'subject' => 'mailto:example@example.com',
                'publicKey' => config('webpush.vapid.public_key'),
                'privateKey' => config('webpush.vapid.private_key'),
            ],
        ]);

        $webPush->sendNotification(
            $subscription->endpoint,
            $payload,
            $subscription->p256dh,
            $subscription->auth
        );
    }
}

