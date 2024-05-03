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
            'status' => 'faild',
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
            ], 404);
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




    public function index(Request $request){

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

        $validator = Validator::make($request->all(), [
            'university_id' => ['required','string'], 
            'faculty_id' => ['required','string'], 
            'name' => ['required','string'],
            'qualification' => ['nullable','array'],
            'requirement' =>['nullable','string'],
           ]);

           $universityId = $request->input('university_id');
           $facultyId = $request->input('faculty_id');
           $name = $request->input('name');
           $qualification = $request->input('qualification');
           $requirement = $request->input('requirement');


           try {
           
                $qualificationString = is_array($qualification) ? implode(',', $qualification) : $qualification;

                YourModel::create([
                    'university_id' => $universityId,
                    'faculty_id' => $facultyId,
                    'name' => $name,
                    'qualification' => $qualificationString,
                    'requirement' => $requirement,
                ]);
       
               return response()->json([
                   'success' => true,
                   'message' => 'Major inserted successfully',
               ], 200);
           }catch (\Exception $e) {
             
               \Log::error($e);
       
               return response()->json([
                   'success' => false,
                   'message' => 'An error occurred while inserting data',
               ], 500);
           }

       }

       public function edit($id){
        $major = Major::find($id);
        if($major == null){
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong!',
                'data' => []
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => $major
        ], 200);
       }

       public function update(Request $request , $id){
        $major = Major::find($id);
        if($major == null){
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong!',
                'data' => []
            ], 500);
        }
        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'qualification' => ['nullable','array'],
            'requirement' =>['nullable','string'], 
           ]);

        if ($validator->fails()) {
           return response()->json([
               'success'=>false,
               'message'=>"There exist one or more errors",
               'data'=>$validator->messages(),
           ],400);
       }

       try{
            $qualificationString = is_array($request->qualification) ? implode(',', $request->qualification) : $request->qualification;


            $major->update([
                'name' => $request->name,
                'qualificarion' => $qualificationString,
                'requirement' => $request->requirement,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Major Updated successfully',
            ], 200);
        }catch (\Exception $e) {
          
            \Log::error($e);
    
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while inserting data',
            ], 500);
        }
    

       }

       public function delete($id){
        $major = Major::find($id);
        if($major == null){
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong!',
                'data' => []
            ], 500);
        }
        $major->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'major deleted successfully',
        ], 200);
       }

}

