<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class AdminForgotPasswordController extends Controller
{
    public function showEmailForm()
    {
        return view('auth.admin-forgot');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email ini belum terdaftar');
        }

        $otp = rand(100000, 999999);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'otp' => Hash::make($otp),
                'expires_at' => Carbon::now()->addMinutes(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        Mail::raw("Kode OTP Reset Password Anda: $otp\nBerlaku 10 menit.", function ($msg) use ($request) {
            $msg->to($request->email)
                ->subject('OTP Reset Password Admin');
        });

        session(['reset_email' => $request->email]);

        return redirect()->route('admin.verify')->with('success', 'OTP telah dikirim ke email');
    }

    public function showOtpForm()
    {
        return view('auth.admin-verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);

        $data = DB::table('password_resets')
            ->where('email', session('reset_email'))
            ->first();

        if (!$data || Carbon::now()->greaterThan($data->expires_at)) {
            return back()->with('error', 'OTP kadaluarsa');
        }

        if (!Hash::check($request->otp, $data->otp)) {
            return back()->with('error', 'OTP salah');
        }

        return redirect()->route('admin.reset');
    }

    public function showResetForm()
    {
        return view('auth.admin-reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);

        User::where('email', session('reset_email'))
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')
            ->where('email', session('reset_email'))
            ->delete();

        session()->forget('reset_email');

        return redirect()->route('login')->with('success', 'Password berhasil direset');
    }
}
