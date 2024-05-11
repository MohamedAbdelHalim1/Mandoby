<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\University;


class UniversityController extends Controller
{
    //for mobile
    public function get_universities(){
        $universities = University::all();
        if(!$universities->isEmpty()){
            return response()->json([
                'status' => 'success',
                'message' => 'Universities retrieved successfully',
                'data' => $universities
            ], 200);
        }
        return response()->json([
            'status' => 'failed',
            'message' => 'No Universities Yet!',
            'data' => []
        ], 200);
        
    }

    //for mobile
    public function university_details($id)
    {
        $university = University::find($id);
        if($university == null){
            return response()->json([
                'status' => 'failed',
                'message' => 'University not found',
                'data' => []
            ], 200);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'University Data Returned',
            'data' => $university
        ], 200);
    }





////////////////////////////////////////




    public function index(){
        $universities = University::all();
        return view('university',compact('universities'));
    }




    public function store(Request $request)
    {

        $messages = [
            'name.required' => 'Please enter All Data*',
        ];


        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'logo' => ['required','image','mimes:jpeg,png,jpg,gif'], 
           ],$messages);

           if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }
    

        $university = new University;
        $university->name = $request->name;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $extension = $logo->getClientOriginalExtension();
            $logoPath = $logo->storeAs('Photos', 'university_logo_' . time() . '.' . $extension, 'public'); // Store the file in the 'public/logos' directory
            $logoUrl = url('storage/' . $logoPath);
            $university->logo = $logoUrl; 
        }
        $university->save();

        return redirect()->route('university.index');
        
        
    }


 

    
    public function edit($id){
        $university = University::find($id);
        return response()->json($university);
    }


    public function update(Request $request)
    {
        $university = University::find($request->university_id);
 
    
        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'logo' => ['nullable','image','mimes:jpeg,png,jpg,gif'], 
           ]);

 
    
        $university->name = $request->name;
        // $university->details = $request->details;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $extension = $logo->getClientOriginalExtension();
            $logoPath = $logo->storeAs('Photos', 'university_logo_' . time() . '.' . $extension, 'public');
            $logoUrl = url('storage/' . $logoPath);
            $university->logo = $logoUrl; 
        }
        // if ($request->hasFile('photo')) {
        //     $photo = $request->file('photo');
        //     $extension = $photo->getClientOriginalExtension();
        //     $photoPath = $photo->storeAs('Photos', 'university_photo_' . time() . '.' . $extension, 'public'); // Store the file in the 'public/photos' directory
        //     $photoUrl = url('storage/' . $photoPath);
        //     $university->photo = $photoUrl; 
        // }
    
        $university->save();
      return redirect()->back();
    }


 
    public function delete($id)
    {
        $university = University::find($id);
        $university->delete();
        return response()->json(['redirect_url' => route('university.index')]);

    }


     //when click on add university details , we will retrieve all universities in dropdown menu
     public function show($id){
        $university = University::find($id);
        return view('university-details',compact('university'));
    }


    public function create_details($id){
        $university = University::find($id);
        return response()->json($university);
    }

    //will get this university using id and fill the null data in photo and details
    public function store_details(Request $request , $id){

        $messages = [
            'details.required' => 'Please enter All Data*',
        ];


        $validator = Validator::make($request->all(), [
            'details' => ['required','string'], 
            'photo' => ['required','image','mimes:jpeg,png,jpg,gif'], 
           ],$messages);

           if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }


        $university = University::find($id);
        $university->details = $request->details;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('Photos', 'university_photo_' . time() . '.' . $extension, 'public'); // Store the file in the 'public/photos' directory
            $photoUrl = url('storage/' . $photoPath);
            $university->photo = $photoUrl; 
        }
        $university->save();
        return redirect()->back();

    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $universities = University::where('name', 'like', "%$query%")->get();
        if(!$universities->isEmpty()){
            return response()->json([
                'status' => 'success',
                'message' => 'Universities retrieved successfully',
                'data' => $universities
            ], 200);
        }
        return response()->json([
            'status' => 'failed',
            'message' => 'No Universities Found!',
            'data' => []
        ], 200);

    }

    public function details($id){
        $university = University::find($id);
        return response()->json($university);
    }

    public function details_upload(Request $request){
      //dd($request);
        $university = University::find($request->details_id);
        $validator = Validator::make($request->all(), [
            'details' => ['required','string'], 
            'photo' => ['nullable','image','mimes:jpeg,png,jpg,gif'], 
           ]);
           $university->details = $request->details; 
         if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('Photos', 'university_photo_' . time() . '.' . $extension, 'public'); // Store the file in the 'public/photos' directory
            $photoUrl = url('storage/' . $photoPath);
            $university->photo = $photoUrl; 
        }

        $university->save();
        return redirect()->back();
    }

}
