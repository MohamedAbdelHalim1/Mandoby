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
            'name' => 'required|string|max:255',
            'phone' => ['required', 'string', 'unique:members,phone'], // Add unique rule here
            'password' => 'required|string', 
        ]);
    
        if ($validator->fails()) {
            $errors = $validator->errors();
        
             // Check if phone number is required
             if ($errors->has('phone') && $validator->errors()->first('phone') === "The phone field is required.") {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Phone number is required',
                ], 200);
            }
            // Check if phone number is not unique
            if ($errors->has('phone')) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Phone number is already taken',
                ], 200);
            }
        
        
            // If none of the above conditions are met, return generic validation failed message
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation failed',
                'errors' => $errors,
            ], 200);
        }
        
    
        $member = new Member();
        $member->name = $request->name;
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
