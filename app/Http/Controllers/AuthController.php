<?php

namespace App\Http\Controllers;

use App\Mail\VerificationCodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('authentication.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'super_admin') {
                return redirect()->route('admin.user.index');
            }
            if ($user->role === 'admin') {
                return redirect()->route('admin.event.index');
            }

            return redirect()->route('admin.dashboard.index');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }

    public function showForgotPasswordForm()
    {
        return view('authentication.forgot-password');
    }

    public function sendResetCode(Request $request)
    {
        $method = $request->input('method');

        if ($method === 'email') {
            $request->validate([
                'email' => 'required|email',
            ]);
            $user = User::where('email', $request->email)->first();
        } else {
            $request->validate([
                'phone_number' => 'required|string',
            ]);
            $user = User::where('phone_number', $request->phone_number)->first();
        }

        if (!$user) {
            return back()->withErrors([
                'user' => ucfirst($method) . ' tidak terdaftar.'
            ])->withInput();
        }

        // generate OTP
        $otp = rand(1000, 9999);
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(5);
        $user->save();

        if ($method === 'email') {
            try {
                Mail::to($user->email)->send(new VerificationCodeMail($otp));
            } catch (\Exception $e) {
                return back()->withErrors(['otp' => 'Gagal mengirim kode via Email: ' . $e->getMessage()]);
            }
        } else {
            try {
                $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
                $twilio->messages->create(
                    "whatsapp:{$user->phone_number}",
                    [
                        'from' => "whatsapp:" . env('TWILIO_FROM'),
                        'body' => "Kode reset password Anda: $otp (berlaku 5 menit)."
                    ]
                );
            } catch (\Exception $e) {
                return back()->withErrors(['otp' => 'Gagal mengirim kode via WhatsApp: ' . $e->getMessage()]);
            }
        }

        session([
            'reset_identifier' => $method === 'email' ? $user->email : $user->phone_number
        ]);

        return redirect()->route('password.verify.form')
            ->with('status', 'Kode verifikasi sudah dikirim ke ' . ($method === 'email' ? 'email' : 'nomor HP') . ' Anda.');
    }

    public function showVerifyCodeForm()
    {
        if (!session()->has('reset_identifier')) {
            return redirect()->route('password.request')
                ->withErrors(['user' => 'Anda harus meminta kode OTP terlebih dahulu.']);
        }

        return view('authentication.verify-code');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'otp' => 'required|integer|min:1000|max:9999',
        ]);

        $identifier = session('reset_identifier');
        $user = User::where('email', $identifier)
            ->orWhere('phone_number', $identifier)
            ->first();

        if (!$user) {
            return redirect()->route('password.request')->withErrors(['user' => 'User tidak ditemukan']);
        }

        if ($user->otp != $request->otp) {
            return back()->withErrors(['otp' => 'Kode OTP salah']);
        }

        if (now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP sudah kadaluarsa']);
        }

        session(['reset_user_id' => $user->id]);

        return redirect()->route('password.reset.form');
    }

    public function showResetPasswordForm()
    {
        if (!session()->has('reset_user_id')) {
            return redirect()->route('password.request')
                ->withErrors(['user' => 'Anda harus memverifikasi kode OTP terlebih dahulu.']);
        }

        return view('authentication.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::find(session('reset_user_id'));
        if (!$user) {
            return redirect()->route('password.request')
                ->withErrors(['user' => 'Session reset tidak valid']);
        }

        $user->password = Hash::make($request->password);
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        session()->forget('reset_user_id');

        return redirect()->route('login.form')->with('status', 'Password berhasil direset, silakan login.');
    }
}
