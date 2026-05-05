<?php

namespace App\Services;

use App\Models\User;
  use App\Notifications\SendOtpNotification;
class OtpService
{
    public function generate(User $user): string
    {
        $code = rand(100000, 999999);
        $user->update([
            'otp_code'       => $code,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        return $code;
    }

  

    public function send(User $user): void
    {
        $code = $this->generate($user);
        $user->notify(new SendOtpNotification($code));
    }

    public function verify(User $user, string $code): bool
    {
        if (
            $user->otp_code !== $code ||
            now()->isAfter($user->otp_expires_at)
        ) {
            return false;
        }

        $user->update([
            'email_verified_at' => now(),
            'otp_code'          => null,
            'otp_expires_at'    => null,
        ]);

        return true;
    }
}
