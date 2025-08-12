<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\VerificationCodeMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

class AuthenticationController extends Controller
{
    public function signIn(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => [
                Auth::user(),
            ],
            'token' => $token,
            'expires_at' => now()->addMinutes(config('sanctum.expiration', 60)),
        ], 200);
    }

    public function signOut(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }

    public function sendCode(Request $request)
    {
        $request->validate([
            'isWithEmail' => 'required|boolean',
            'email' => 'required_if:isWithEmail,true|email',
            'phone_number' => 'required_if:isWithEmail,false|string',
        ]);

        $isWithEmail = $request->isWithEmail;


        $user = User::where($isWithEmail ? 'email' : "phone_number", $isWithEmail ? $request->email : $request->phone_number)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        $otp = rand(1000, 9999);
        $otpExpiresAt = now()->addMinutes(5);
        $user->otp = $otp;
        $user->otp_expires_at = $otpExpiresAt;
        $user->save();
        $subject = 'OTP Verification Code';

        if ($isWithEmail) {
            Mail::to($user->email)->send(new VerificationCodeMail($otp));


            return response()->json([
                'message' => 'Verification code sent to your email successfully',
                'method' => 'email',
                'destination' => $user->email,
                'expires_at' => $otpExpiresAt->toDateTimeString(),
            ], 200);
        } else {


            $twilioSid = env('TWILIO_SID');
            $twilioToken = env('TWILIO_TOKEN');
            $twilioWhatsappFrom = env('TWILIO_FROM');
            if (!$twilioSid || !$twilioToken || !$twilioWhatsappFrom) {
                return response()->json([
                    'message' => 'Twilio configuration is missing',
                ], 500);
            }


            $client = new Client($twilioSid, $twilioToken);

            try {
                $message = $client->messages->create(
                    // $whatsappNumber,
                    "whatsapp:{$user->phone_number}",
                    [
                        'from' => "whatsapp:$twilioWhatsappFrom",
                        'body' => "Your verification code is: $otp"
                    ]
                );



                return response()->json([
                    'message' => 'Verification code sent to your WhatsApp successfully',
                    'method' => 'whatsapp',
                    'destination' => $request->phone_number,
                    'message_sid' => $message->sid
                ], 200);
            } catch (Exception $e) {
                return response()->json([
                    'message' => 'Failed to send WhatsApp message',
                    'error' => $e->getMessage(),
                    'phone_formatted' => $request->phone_number,
                ], 500);
            }
            // dd('SMS sent to ' . $user->phone_number . ' with OTP: ' . $otp);
        }

        return response()->json([
            'message' => 'Verification code sent successfully',
            'method' => $isWithEmail ? 'email' : 'phone',
            'code' => $otp,
        ], 200);
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'isWithEmail' => 'required|boolean',
            'email' => 'required_if:isWithEmail,true|email',
            'phone_number' => 'required_if:isWithEmail,false|string',
            'otp' => 'required|integer|min:1000|max:9999',
        ]);

        $isWithEmail = $request->isWithEmail;

        $user = User::where($isWithEmail ? 'email' : "phone_number", $isWithEmail ? $request->email : $request->phone_number)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        if ($user->otp !== $request->otp) {
            return response()->json([
                'message' => 'Invalid OTP',
            ], 400);
        }

        if (now()->greaterThan($user->otp_expires_at)) {
            return response()->json([
                'message' => 'OTP has expired',
            ], 400);
        }

        $user->otp = null;
        $user->save();

        // OTP is valid, proceed with authentication
        return response()->json([
            'message' => 'OTP verified successfully',
        ], 200);
    }

}
