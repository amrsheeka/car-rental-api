<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\SendOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $otp = random_int(100000, 999999);
        DB::transaction(function () use ($validated, &$user, $otp) {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'phone' => null,
                'email_otp' => $otp,
                'email_otp_expires_at' => now()->addMinutes(10),
                'email_verified_at' => null,
            ]);

            Mail::to($user->email)->queue(new SendOtpMail($otp));
        });
        return response()->json(['message' => 'User registered successfully'], 201);
    }
    public function login(LoginRequest $request)
    {
        $request->validated();

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        if (!$user->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Email not verified',
            ], 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message'=>'Login succefully',
            'token' => $token,
            'user' => $user,
            'token_type' => 'Bearer',
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        if ($user->email_otp !== $request->otp) {
            return response()->json([
                'message' => 'Invalid OTP'
            ], 400);
        }

        if (now()->gt($user->email_otp_expires_at)) {
            return response()->json([
                'message' => 'OTP expired'
            ], 400);
        }

        $user->email_verified_at = now();
        $user->is_verified = true;
        $user->email_otp = null;
        $user->email_otp_expires_at = null;
        $user->save();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Email verified successfully',
            'token' => $token,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully',
        ]);
    }
}
