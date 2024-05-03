<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;


class MemberController extends Controller
{

    //for mobile
public function getMemberById(Request $request)   //for profile
{
    try {
        $memberId = JWTAuth::parseToken()->getPayload()->get('sub');

        // Retrieve the member by ID
        $member = Member::findOrFail($memberId);

        return response()->json([
            'status' => 'success',
            'message'=> 'User retrieved successfully',
            'member' => $member,
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to retrieve member data',
            'error' => $e->getMessage(),
        ], 500);
    }
}



//////////////////////////////////////////////

    public function index(){
        $members = Member::all();
        if(!$members->isEmpty()){
            return response()->json([
                'status' => 'success',
                'message' => 'Members retrieved successfully',
                'data' => $members
            ], 200);
        }
        return response()->json([
            'status' => 'faild',
            'message' => 'No Members Yet!',
            'data' => []
        ], 200);
        
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'email' => ['required','string','email'],
            'phone' => ['required','string'], 
            'password' => ['nullable','string'], 
           ]);

        if ($validator->fails()) {
           return response()->json([
               'status'=>false,
               'message'=>"There exist one or more errors",
               'data'=>$validator->messages(),
           ],400);
       }
    

        $member = new Member;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->password = bcrypt($request->password);
      
        $member->save();

        if ($member->exists){
            return response()->json([
                'status' => 'success',
                'message' => 'Member added successfully',
                'data' => $member
            ], 201);
        }
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong , Try Again!',
                'data' => []
            ], 500);
        
        
    }


}
