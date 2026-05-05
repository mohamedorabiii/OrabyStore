<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\ResetPasswordRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function __construct(protected AuthService $authService) {}

  public function register(RegisterRequest $request)
  {
    $result = $this->authService->register($request->validated());

    return response()->json([
      'message' => 'Registered successfully. Please verify your email.',
      'user'    => new UserResource($result['user']),
      'token'   => $result['token'],
    ], 201);
  }

  public function login(LoginRequest $request)
  {
    $result = $this->authService->login($request->validated());

    return response()->json([
      'message' => 'Logged in successfully.',
      'user'    => new UserResource($result['user']),
      'token'   => $result['token'],
    ]);
  }

  public function verifyOtp(Request $request)
  {
    $request->validate([
      'code' => 'required|string|size:6',
    ]);

    $user    = $request->user();
    $verified = $this->authService->verifyOtp($user, $request->code);

    if (!$verified) {
      return response()->json([
        'message' => 'Invalid or expired code.',
      ], 422);
    }

    return response()->json([
      'message' => 'Email verified successfully.',
    ]);
  }

  public function resendOtp(Request $request)
  {
    $user = $request->user();

    if ($user->email_verified_at) {
      return response()->json([
        'message' => 'Email already verified.',
      ], 422);
    }

    $this->authService->resendOtp($user);

    return response()->json([
      'message' => 'A new code has been sent to your email.',
    ]);
  }

  public function logout(Request $request)
  {
    $this->authService->logout($request->user());

    return response()->json([
      'message' => 'Logged out successfully.',
    ]);
  }
  public function forgotPassword(Request $request)
  {
    $request->validate(['email' => 'required|email|exists:users,email']);
    $this->authService->forgotPassword($request->email);

    return response()->json([
      'message' => 'Password reset code sent to your email.',
    ]);
  }

public function resetPassword(ResetPasswordRequest $request)
{
    $data = $request->validated();

    $reset = $this->authService->resetPassword(
        $data['email'],
        $data['code'],
        $data['password']
    );

    if (!$reset) {
        return response()->json(['message' => 'Invalid or expired code.'], 422);
    }

    return response()->json(['message' => 'Password reset successfully.']);
}
}
