<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Faculty;
use App\Models\University;
use App\Models\Major;
use Illuminate\Support\Facades\DB;

class MajorController extends Controller
{

    //for mobile
    public function get_majors($id){
        $majors = Major::where('faculty_id','=',$id)->get();
        if(!$majors->isEmpty()){
            return response()->json([
                'status' => 'success',
                'message' => 'majors retrieved successfully',
                'data' => $majors
            ], 200);
        }
        return response()->json([
            'status' => 'failed',
            'message' => 'No majors Yet!',
            'data' => []
        ], 200);
    }


    public function show_major_requirement_and_qualification($id){
        $major = Major::find($id);
        if($major == null){
            return response()->json([
                'status' => 'failed',
                'message' => 'Major Not Found',
                'data' => []
            ], 200);
        }
        $qualificationsArray = explode(',', $major->qualification);

        $requirementsArray = explode(',', $major->requirement);

        $result = [
            'qualifications' => $qualificationsArray,
            'requirements' => $requirementsArray
        ];
        return response()->json([
            'status' => 'success',
            'message' => 'Major Data Returned Successfully',
            'data' => $result
        ], 200);
    }





    ///////////////////////////////////////////////////


    public function index(){
        $majors = Major::all();
        $universities = University::all();
        return view('major' , compact('majors' , 'universities'));
    }


    public function index_filter(Request $request){

        try{
            $majors = Major::orderBy('id', 'desc');

            $universityId = $request->university_id;
            $facultyId = $request->faculty_id;

            if($universityId){
                $query = "SELECT * 
                FROM majors m 
                WHERE m.faculty_id = (SELECT id 
                                       FROM faculties f 
                                       WHERE f.university_id = ?)";
      
                $majors = DB::select($query, [$universityId]);
            }elseif($facultyId || $universityId && $facultyId){
                $query = "SELECT * 
                FROM majors m
                WHERE m.faculty_id = ?";
                $majors = DB::select($query , [$facultyId]);
            }
    
            $majors = $majors->get();
    
            return response()->json([
                'status' => 'success',
                'message' => 'majors retrieved successfully',
                'data' => [
                    'universities' => $universities,
                    'faculties' => $faculties,
                    'majors' => $majors
                ]
            ], 200);
        }catch (\Exception $e) {
             
            \Log::error($e);
    
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while retrieving data',
            ], 500);
        }
      
       }


       public function getFaculties(Request $request) {
        $universityId = $request->input('university_id');
        $faculties = Faculty::where('university_id', $universityId)->get();
        return response()->json([
            'success' => true,
            'data' => [
                'faculties' => $faculties
            ]
        ]);
    }



       public function store(Request $request){

        $messages = [
            'name.required' => 'Please enter All Data*',
        ];

        $validator = Validator::make($request->all(), [
            'university_id' => ['required','string'], 
            'faculty_id' => ['required','string'], 
            'name' => ['required','string'],
            'qualification' => ['required','array'],
            'requirement' =>['required','string'],
           ]);

           if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

           $universityId = $request->input('university_id');
           $facultyId = $request->input('faculty_id');
           $name = $request->input('name');
           $qualification = $request->input('qualification');
           $requirement = $request->input('requirement');


           try {
           
                $qualificationString = is_array($qualification) ? implode(',', $qualification) : $qualification;

                Major::create([
                    'university_id' => $universityId,
                    'faculty_id' => $facultyId,
                    'name' => $name,
                    'qualification' => $qualificationString,
                    'requirement' => $requirement,
                ]);
       
               return redirect()->back();
           }catch (\Exception $e) {
             
               \Log::error($e);
           }

       }

       public function edit($id){
        $major = Major::find($id);
        return response()->json($major);
       }

       public function update(Request $request){
        $major = Major::find($request->major_id);
        
        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
           ]);


       try{


            $major->update([
                'name' => $request->name,
                
            ]);
            return redirect()->back();

        }catch (\Exception $e) {
          
            \Log::error($e);
    
           
        }
    

       }

       public function delete($id){
        $major = Major::find($id);
        $major->delete();
      
       }



       public function filterData(Request $request)
       {
           //dd($request);
           $facultyId = $request->input('faculty_id');
   
           $filteredData = Major::where('faculty_id','=',$facultyId)->get();
   
           
           return view('filter-majors', compact('filteredData'));
       }

}

