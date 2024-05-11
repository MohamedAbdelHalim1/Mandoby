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
            'status' => 'failed',
            'message' => 'Failed to retrieve member data',
            'error' => $e->getMessage(),
        ], 500);
    }
}



//////////////////////////////////////////////

    public function index(){
        $members = Member::all();
        return view('member',compact('members'));
    }


    public function store(Request $request)
    {

        //add nationality
        
        $validator = Validator::make($request->all(), [
            'first_name' => ['required','string'], 
            'last_name' => ['required','string'], 
            'phone' => ['required','string'], 
            'password' => ['required','string'], 
           ]);

    

        $member = new Member;
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->phone = $request->phone;
        $member->password = bcrypt($request->password);
      
        $member->save();
           return redirect()->back();
        
    }


}
