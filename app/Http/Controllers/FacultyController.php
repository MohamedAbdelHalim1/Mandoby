<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Faculty;
use App\Models\University;

class FacultyController extends Controller
{

    private function get_universities(){
        return University::all();
    }

    //for mobile
    public function get_faculties($id){
        $faculties = Faculty::where('university_id','=',$id)->get();
        if(!$faculties->isEmpty()){
            return response()->json([
                'status' => 'success',
                'message' => 'faculties retrieved successfully',
                'data' => $faculties
            ], 200);
        }
        return response()->json([
            'status' => 'faild',
            'message' => 'No faculties Yet!',
            'data' => []
        ], 200);
       }





       /////////////////////////////////////////////////
       
    
   public function index(){
    $universities = $this->get_universities();
    if(!$universities->isEmpty()){
        return response()->json([
            'status' => 'success',
            'message' => 'Universities retrieved successfully',
            'data' => $universities
        ], 200);
    }
    return response()->json([
        'status' => 'faild',
        'message' => 'No Universities Yet!',
        'data' => []
    ], 200);
   }

   public function show_faculty($id){
    $faculties = Faculty::where('university_id','=',$id)->get();
    if(!$faculties->isEmpty()){
        return response()->json([
            'status' => 'success',
            'message' => 'faculties retrieved successfully',
            'data' => $faculties
        ], 200);
    }
    return response()->json([
        'status' => 'faild',
        'message' => 'No faculties Yet!',
        'data' => []
    ], 200);
   }

   public function create(){
    $universities = $this->get_universities();
    if(!$universities->isEmpty()){
        return response()->json([
            'status' => 'success',
            'message' => 'Universities retrieved successfully',
            'data' => $universities
        ], 200);
    }
    return response()->json([
        'status' => 'faild',
        'message' => 'No Universities Yet!',
        'data' => []
    ], 200);
   }

   public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'degree' => ['nullable'], 
            'university_id' => ['required'],
           ]);

        if ($validator->fails()) {
           return response()->json([
               'success'=>false,
               'message'=>"There exist one or more errors",
               'data'=>$validator->messages(),
           ],400);
       }
    

        $faculty = new Faculty;
        $faculty->name = $request->name;
        $faculty->university_id = $request->university_id;
        $faculty->degree = $request->degree;     
        $faculty->save();

        if ($faculty->exists){
            return response()->json([
                'status' => 'success',
                'message' => 'Faculty added successfully',
                'data' => $faculty
            ], 201);
        }
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong , Try Again!',
                'data' => []
            ], 500);
    }

    public function edit($id){
        $faculty = Faculty::find($id);
        if($faculty !== null){
            return response()->json([
                'status' => 'success',
                'message' => '',
                'data' => $faculty
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
        $faculty = Faculty::find($id);
    
        if ($faculty == null) {
            return response()->json([
                'status' => 'failed',
                'message' => 'faculty not found',
                'data' => []
            ], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'degree' => ['nullable'], 
           ]);

        if ($validator->fails()) {
           return response()->json([
               'success'=>false,
               'message'=>"There exist one or more errors",
               'data'=>$validator->messages(),
           ],400);
       }
   
    
       $faculty->update([
        'name' => $request->input('name'),
        'degree' => $request->input('degree'),
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Faculty updated successfully',
        'data' => $faculty
    ], 200);
    
    }

    public function delete($id)
    {
        $faculty = Faculty::find($id);

        if ($faculty == null) {
            return response()->json([
                'status' => 'failed',
                'message' => 'faculty not found',
                'data' => []
            ], 404);
        }

        $faculty->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'faculty deleted successfully',
            'data' => []
        ], 200);
    }

}
