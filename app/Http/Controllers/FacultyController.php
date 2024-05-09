<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Faculty;
use App\Models\University;

class FacultyController extends Controller
{


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
    $universities = University::all();
    $faculties = Faculty::all();
    return view('faculty' , compact('universities' , 'faculties'));

   }

  

   public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Please enter All Data*',
        ];

        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'degree' => ['required'], 
            'university' => ['required'],
           ], $messages);

           if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }
    

        $faculty = new Faculty;
        $faculty->name = $request->name;
        $faculty->university_id = $request->university;
        $faculty->degree = $request->degree;     
        $faculty->save();

      return redirect()->back();
    }

    public function edit($id){
        $faculty = Faculty::find($id);
      
        return response()->json([
            'faculty' => $faculty,
        ]);
    }

    public function update(Request $request)
    {
       // dd($request);
        $faculty = Faculty::find($request->faculty_id);
    
        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'degree' => ['required'], 
            'university'=>['nullable']
           ]);
   
       $faculty->name = $request->name;
       $faculty->degree = $request->degree;
       $faculty->university_id = $request->university;
           $faculty->save();
       return redirect()->back();
    
    }

    public function delete($id)
    {
        $faculty = Faculty::find($id);
        $faculty->delete();

    }

    public function filterData(Request $request)
    {
        //dd($request);
        $universityId = $request->input('university_id');

        $filteredData = Faculty::where('university_id','=',$universityId)->get();

        
        return view('filtered-table', compact('filteredData'));
    }

    public function getFaculties(Request $request){
        $faculties = Faculty::where('university_id','=',$request->university_id)->get();
        return response()->json([
            'faculties' => $faculties
        ]);
    }

}
