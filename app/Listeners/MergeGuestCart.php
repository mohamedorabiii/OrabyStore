<?php

namespace App\Listeners;

use App\Models\Cart;
use Illuminate\Auth\Events\Login;

class MergeGuestCart
{
    public function handle(Login $event): void
    {
        $user      = $event->user;
        $sessionId = request()->cookie(config('session.cookie'));

        if (!$sessionId) return;

        // API request - no session
        try {
            request()->session()->getId();
        } catch (\RuntimeException $e) {
            return;
        }

        $guestItems = Cart::whereNull('user_id')
            ->where('session_id', $sessionId)
            ->get()
            ->groupBy('product_id');

        foreach ($guestItems as $productId => $items) {
            $guestQuantity = $items->sum('quantity');

            $userItem = Cart::where('user_id', $user->id)
                ->where('product_id', $productId)
                ->first();

            if ($userItem) {
                $userItem->update([
                    'quantity' => min($userItem->quantity + $guestQuantity, 20),
                ]);
                Cart::whereIn('id', $items->pluck('id'))->delete();
                continue;
            }

            $firstItem = $items->first();
            $firstItem->update([
                'user_id'    => $user->id,
                'session_id' => null,
                'quantity'   => min($guestQuantity, 20),
            ]);

            if ($items->count() > 1) {
                Cart::whereIn('id', $items->skip(1)->pluck('id'))->delete();
            }
        }
    }
}