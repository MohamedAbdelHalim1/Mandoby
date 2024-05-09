<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user',compact('users'));
        
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'email' => ['required','string','email'],
            'role' => ['required','string','in:user,admin'],
            'password' => ['required','string'], 
           ]);

        
    

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
      
        $user->save();

      return redirect()->back();
        
        
    }
}
