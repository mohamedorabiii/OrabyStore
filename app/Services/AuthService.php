<?php

namespace App\Services;

use App\Models\User;
use App\Services\OtpService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(protected OtpService $otpService) {}

    public function register(array $data): array
    {
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $this->otpService->send($user);

        $token = $user->createToken('auth_token')->plainTextToken;

        return compact('user', 'token');
    }

    public function login(array $data): array
    {
        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user = Auth::user();

        if (!$user->email_verified_at) {
            $this->otpService->send($user);
            throw ValidationException::withMessages([
                'email' => ['Please verify your email first. A new code has been sent.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return compact('user', 'token');
    }

    public function logout($user): void
    {
        $user->currentAccessToken()->delete();
    }

    public function verifyOtp(User $user, string $code): bool
    {
        return $this->otpService->verify($user, $code);
    }
    public function forgotPassword(string $email): void
    {
        $user = User::where('email', $email)->firstOrFail();
        $this->otpService->send($user);
    }

    public function resetPassword(string $email, string $code, string $password): bool
    {
        $user = User::where('email', $email)->firstOrFail();

        if (!$this->otpService->verify($user, $code)) {
            return false;
        }

        $user->update(['password' => Hash::make($password)]);

        return true;
    }
}
