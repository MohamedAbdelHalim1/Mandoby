<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nationality;
use Illuminate\Support\Facades\Validator;


class NationalityController extends Controller
{
    //for mobile
    public function get_nationalities(){
        $nationalities = Nationality::all();
        if(!$nationalities->isEmpty()){
            return response()->json([
                'status' => 'success',
                'message' => 'Nationalities retrieved successfully',
                'data' => $nationalities
            ], 200);
        }
        return response()->json([
            'status' => 'failed',
            'message' => 'No Nationalities Yet!',
            'data' => []
        ], 200);
        
    }
//////////////////////////////////////////

    public function index(){
        $nationalities = Nationality::all();
        return view('nationality' , compact('nationalities'));
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Please enter name*',
        ];


        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'photo' => ['nullable','image','mimes:jpeg,png,jpg,gif'], 
           ],$messages);

           if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }
    

        $nationality = new Nationality;
        $nationality->name = $request->name;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('Photos', 'nationality_photo_' . time() . '.' . $extension, 'public'); // Store the file in the 'public/photos' directory
            $nationality->photo = $photoPath;
        }
        $nationality->save();

        return redirect()->route('nationalities.index');

        
        
    }


    public function edit($id){
        $nationality = Nationality::find($id);
        if($nationality !== null){
            return response()->json([
                'status' => 'success',
                'message' => '',
                'data' => $nationality
            ], 200);
        }
        return response()->json([
            'status' => 'failed',
            'message' => 'Something went wrong!',
            'data' => []
        ], 500);
    }



    public function update(Request $request, $id)
    {
        $nationality = Nationality::find($id);
    
        if ($nationality == null) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Nationality not found',
                'data' => []
            ], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'photo' => ['nullable','image','mimes:jpeg,png,jpg,gif'], 
           ]);

        if ($validator->fails()) {
           return response()->json([
               'success'=>false,
               'message'=>"There exist one or more errors",
               'data'=>$validator->messages(),
           ],400);
       }
   
    
        $nationality->name = $request->name;
    
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('Photos', 'nationality_photo_' . time() . '.' . $extension, 'public');
            $nationality->photo = $photoPath;
        }
    
        $nationality->save();
        if ($nationality->exists){
        return response()->json([
            'status' => 'success',
            'message' => 'Nationality updated successfully',
            'data' => $nationality
        ], 200);
        }
        return response()->json([
            'status' => 'failed',
            'message' => 'Something went wrong',
            'data' => ""
        ], 500);
    }


    public function delete($id)
    {
        $nationality = Nationality::find($id);
        $nationality->delete();
    }

    
}