<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Faculty;
use App\Models\Nationality;
use App\Models\NationalityUniversity;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;



class NationalityController extends Controller
{
    //for mobile
    public function get_nationalities(){
        $nationalities = Nationality::orderBy('order', 'asc')->get();
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
            ], 200);
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
        $nationalities = Nationality::orderBy('order', 'asc')->get();
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
            'order'=>['required','integer'],
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
        $nationality->order = $request->order;
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

    public function show($id){
        $nationality = Nationality::find($id);
        $Nationality_universities = $nationality->universities;
         // Get all universities except those already attached to the nationality
        $universities = University::whereNotIn('id', $Nationality_universities->pluck('id'))->get();
        return view('nationality-details' , compact('Nationality_universities','universities','id'));
    }

    public function store_universities(Request $request , $id){
        //dd($request);
        $nationality = Nationality::find($id);
        $request->validate([
            'universities' => 'required|array', 
            'universities.*' => 'integer|exists:universities,id', // Ensure each university ID exists in the database
        ]);

    $nationality->universities()->attach($request->universities);
    return redirect()->back()->with('success', 'تم اضافه الجامعة بنجاح');
        
    }

    public function delete_university($nationalityId , $universityId){
        try {
            $pivotRecord = NationalityUniversity::where('nationality_id', $nationalityId)
                                                ->where('university_id', $universityId)
                                                ->firstOrFail();

            $pivotRecord->delete();

        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete pivot record: ' . $e->getMessage()], 500);
        }
    }
    


    public function edit($id){
        $nationality = Nationality::find($id);
        return response()->json($nationality);
    }



    public function update(Request $request)
    {
        
        $nationality = Nationality::findOrFail($request->nationality_id);
        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'order'=>['required','integer'],
            'photo' => ['nullable','image','mimes:jpeg,png,jpg,gif'], 
           ]);
   
    
        $nationality->name = $request->name;
        $nationality->order = $request->order;
    
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('Photos', 'nationality_photo_' . time() . '.' . $extension, 'public');
            $photoUrl = url('storage/' . $photoPath);
            $nationality->photo = $photoUrl; 
                }
    
        $nationality->save();   
        return redirect()->back();  
    }


    public function delete($id)
    {
        $nationality = Nationality::find($id);
        $nationality->delete();
    }



    public function show_faculties_nationalities_degree($faculty_id){
        $faculty = Faculty::with(['nationalities' => function ($query) {
            $query->withPivot('degree');
        }])->find($faculty_id);
        $nationalities = Nationality::all();
        return view('faculty_details',compact('faculty','nationalities'));
    }

    public function add_degree_to_nationalities(Request $request , $faculty_id){
        $validator = Validator::make($request->all(), [
            'degree' => 'required', 
            'nationality'=>'required'
        ]);

        // Find the faculty and nationality
        $faculty = Faculty::findOrFail($faculty_id);
        $nationality = Nationality::findOrFail($request->nationality);

        $faculty->nationalities()->attach($nationality, ['degree' => $request->degree]);

        return redirect()->back();


    }

    public function deleteNationalityFromFaculty($faculty_id, $nationality_id)
    {
        $faculty = Faculty::findOrFail($faculty_id);
        $faculty->nationalities()->detach($nationality_id);

        // Optionally, redirect back with a success message
        return redirect()->back()->with('success', 'تم المسح.');
    }
    
}