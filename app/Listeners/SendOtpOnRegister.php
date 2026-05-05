<?php

namespace App\Listeners;

use App\Services\OtpService;
use Illuminate\Auth\Events\Registered;

class SendOtpOnRegister
{
    public function __construct(protected OtpService $otpService) {}

    public function handle(Registered $event): void
    {
        $this->otpService->send($event->user);
    }
}