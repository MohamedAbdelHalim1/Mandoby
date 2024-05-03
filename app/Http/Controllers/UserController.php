<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class UserController extends Controller
{
    public function index(){
        $users = User::all();
        if(!$users->isEmpty()){
            return response()->json([
                'status' => 'success',
                'message' => 'Users retrieved successfully',
                'data' => $users
            ], 200);
        }
        return response()->json([
            'status' => 'faild',
            'message' => 'No Users Yet!',
            'data' => []
        ], 200);
        
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'email' => ['required','string','email'],
            'role' => ['required','string','in:user,admin'],
            'password' => ['required','string'], 
           ]);

        if ($validator->fails()) {
           return response()->json([
               'status'=>false,
               'message'=>"There exist one or more errors",
               'data'=>$validator->messages(),
           ],400);
       }
    

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
      
        $user->save();

        if ($user->exists){
            return response()->json([
                'status' => 'success',
                'message' => 'User added successfully',
                'data' => $user
            ], 201);
        }
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong , Try Again!',
                'data' => []
            ], 500);
        
        
    }
}
