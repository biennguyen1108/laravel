<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\OTPMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json(['error' => 'Email not found'], 404);
        }

        // Tạo OTP ngẫu nhiên
        $otp = mt_rand(100000, 999999);

        // Lưu OTP vào trường otp_token của user
        $user->otp_token = $otp;
        $user->save();

        // Gửi email chứa OTP
        Mail::to($user->email)->send(new OTPMail($otp));

        return response()->json(['message' => 'OTP has been sent to your email']);
    }
}
