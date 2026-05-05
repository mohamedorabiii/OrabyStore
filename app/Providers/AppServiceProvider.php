<?php

namespace App\Providers;
use App\Listeners\SendOtpOnRegister;
use Illuminate\Auth\Events\Registered;
use App\Listeners\MergeGuestCart;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Event::listen(Login::class, MergeGuestCart::class);
        Event::listen(Registered::class, SendOtpOnRegister::class);
    }
}