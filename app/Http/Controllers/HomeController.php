<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Nationality;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $nationalities = Nationality::with('members')->get();
        return view('home', compact('nationalities'));
    }

    public function get_user()
    {
        return view('user_details');
    }


    public function update_user(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();
        return redirect()->back();
    }

    public function update_user_photo(Request $request){

        $user = User::find(Auth::user()->id);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('Photos', 'user_photo_' . time() . '.' . $extension, 'public'); // Store the file in the 'public/photos' directory
            $photoUrl = url('storage/' . $photoPath);
            $user->photo = $photoUrl; 
        }
        $user->save();
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        return redirect()->route('login');
    }
}
