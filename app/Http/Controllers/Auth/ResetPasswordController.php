<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function __construct(protected AuthService $authService) {}

    public function showResetForm(Request $request)
    {
        return view('auth.passwords.reset', [
            'email' => $request->email,
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|exists:users,email',
            'code'     => 'required|string|size:6',
            'password' => 'required|min:8|confirmed',
        ]);

        $reset = $this->authService->resetPassword(
            $request->email,
            $request->code,
            $request->password
        );

        if (!$reset) {
            return back()->withErrors(['code' => 'Invalid or expired code.']);
        }

        return redirect()->route('login')
            ->with('success', 'Password reset successfully!');
    }
}