<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Mail;
use App\Mail\OTPMail;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function generateOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $token = mt_rand(100000, 999999); // Tạo mã OTP ngẫu nhiên có 6 ký tự

        $user->otp_token = $token;
        $user->save();

        // Gửi email chứa OTP
        Mail::to($user->email)->send(new OTPMail($token));

        return response()->json(['message' => 'OTP generated successfully']);
    }
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }
    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->input('email'))->exists();

        return response()->json(['exists' => $user]);
    }

    /**
     * Reset user password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp_token' => 'required|numeric',
            'password' => 'required|min:6',
        ]);

        // Kiểm tra email và OTP
        $user = User::where('email', $request->input('email'))
            ->where('otp_token', $request->input('otp_token'))
            ->first();

        if (!$user) {
            return response()->json(['error' => 'Invalid email or OTP'], 422);
        }

        // Cập nhật mật khẩu mới
        $user->password = Hash::make($request->input('password'));
        $user->otp_token = null;
        $user->save();

        return response()->json(['message' => 'Password has been reset successfully']);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $data = $request->all();
        $data['password'] = Hash::make($data['password']); // Mã hóa mật khẩu

        $user = User::create($data);

        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'email' => 'email|unique:users,email,' . $user->id,
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user->update($request->all());

        return response()->json($user);
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        if ($user->otp_token !== $request->input('otp')) {
            return response()->json(['error' => 'Invalid OTP'], 422);
        }

        return response()->json(['otp_token' => $user->otp_token]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(null, 204);
    }
}
