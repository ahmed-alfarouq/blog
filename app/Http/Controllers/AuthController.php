<?php

namespace App\Http\Controllers;

use App\Jobs\SendOtpJob;
use App\Models\OTP;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'avatar' => 'https://randomuser.me/api/portraits/men/43.jpg',
        ]);

        Auth::login($user);
        return redirect('/blog');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::validate($credentials)) {
            $user = User::firstWhere('email', $request->email);
            $otp = OTP::generate($user->id, 5);

            session(['otp_user_id' => $user->id, 'otp_resend_available_at' => now()->addMinutes(1)]);

            SendOtpJob::dispatch($user, $otp->code, 5);

            return redirect('/verify-otp')->with('userId', $user->id);
        };

        return back()->withErrors(['login' => 'The provided credentials do not match our records.'])->onlyInput('email');
    }

    public function verifyOTP(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|digits:6',
        ]);
        $userId = session('otp_user_id');

        if (!$userId) {
            return back()->withErrors(['otp' => 'Session expired. Please request a new OTP.']);
        }

        $otp = Otp::where('user_id', $request->user_id)
            ->where('code', $request->code)
            ->latest()
            ->first();

        if ($otp && $otp->isValid()) {
            Auth::loginUsingId($request->user_id);
            $request->session()->regenerate();

            return redirect()->intended('/blog');
        }

        return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
