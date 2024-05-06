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
    public function get_universities_nationality($id){
        $nationality = Nationality::find($id);
        if (!$nationality) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Nationality not found',
                'data' => []
            ], 404);
        }
        $universities = $nationality->universities;
        if($universities->isEmpty()){
            return response()->json([
                'status' => 'failed',
                'message' => 'No Universities for this nationality!',
                'data' => []
            ], 200);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Universities retrieved successfully',
            'data' => $universities
        ], 200);
        
    }
//////////////////////////////////////////

    public function index(){
        $nationalities = Nationality::all();
        return view('nationality' , compact('nationalities'));
    }

    public function store(Request $request)
    {
       // dd($request);
        $messages = [
            'name.required' => 'Please enter All Data*',
        ];

        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'photo' => ['required','image','mimes:jpeg,png,jpg,gif'], 
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
            $photoUrl = url('storage/' . $photoPath); // Construct the full URL of the stored photo
            $nationality->photo = $photoUrl; // Store the URL in the 'photo_url' column
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
            $photoUrl = url('storage/' . $photoPath);
            $nationality->photo = $photoUrl; 
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