<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nationality;

class HomeController extends Controller
{
    
    
    public function index()
    {
        $nationalities = Nationality::with('members')->get();
        return view('home', compact('nationalities'));
    }
}
