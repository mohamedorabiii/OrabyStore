<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\OtpService;
use Illuminate\Http\Request;
use ReturnTypeWillChange;

class VerificationController extends Controller
{
    public function __construct(protected OtpService $OtpService) {}
    public function show()
    {
        return view('auth.verify-email');

    }
    public function resend(Request $request)
    {        $user = $request->user();
        $this->OtpService->send($user);

        return back()->with('message', 'Verification code resent. Please check your email.');
      
    }
    public function verify(Request $request)
{
    $request->validate(['code' => 'required|string|size:6']);

    $verified = $this->OtpService->verify($request->user(), $request->code);

    if (!$verified) {
        return back()->withErrors(['code' => 'Invalid or expired code.']);
    }

    return redirect()->route('home')->with('success', 'Email verified successfully!');
}
}
