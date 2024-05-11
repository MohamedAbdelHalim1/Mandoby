<?php

namespace App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{
    public function user_register(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string',
            'password' => 'required|string', 
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 200);
        }
    
        $member = new Member();
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->phone = $request->phone;
        $member->password = bcrypt($request->password); 
        $member->save();
    
        // Generate JWT token for the registered member
        $token = JWTAuth::fromUser($member);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Member registered successfully',
            'data' => $member,
            'token' => $token,
        ], 201);
    }
    
}
