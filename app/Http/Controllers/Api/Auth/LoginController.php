<?php

namespace App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function user_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 200);
        }

        // Attempt to authenticate the user with phone and password
        if (!Auth::guard('api')->attempt(['phone' => $request->phone, 'password' => $request->password])) {
            // If authentication fails, return error response
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid phone number or password',
            ], 200);
        }

        // Get the authenticated member
        $member = Auth::guard('api')->user();

        // Generate JWT token for the authenticated user
        $token = JWTAuth::fromUser($member);

        return response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'data' => $member,
            'token' => $token,
        ], 200);
    }
}