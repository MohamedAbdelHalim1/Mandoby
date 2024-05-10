<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;

class LogoutController extends Controller
{

    //for mobile

    public function user_logout(Request $request)
    {
        try {
            $token = JWTAuth::getToken(); // Retrieve the token
            Log::info('Token before invalidation: ' . $token); // Log the token
    
            JWTAuth::parseToken()->invalidate();
    
            return response()->json([
                'status' => 'success', 
                'message' => 'User logged out successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed', 
                'message' => 'Unable to logout: ' . $e->getMessage()
            ], 500);
        }
    }





    /////////////////////////////////














    public function logout(Request $request)
    {
        try {
            JWTAuth::parseToken()->invalidate();

            return response()->json(
                ['status' => 'success', 
                'message' => 'User logged out successfully'
            ],200);
        } catch (\Exception $e) {
            return response()->json(
                ['status' => 'failed', 
                'message' => 'Unable to logout'
            ], 500);
        }
    }
}




