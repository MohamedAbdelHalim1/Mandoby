<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BasicService;


class BasicServiceController extends Controller
{
    //for mobile
    public function get_basic_services(){
        $BasicServices = BasicService::all();
        if(!$BasicServices->isEmpty()){
            return response()->json([
                'status' => 'success',
                'message' => 'Basic Services retrieved successfully',
                'data' => $BasicServices
            ], 200);
        }
        return response()->json([
            'status' => 'failed',
            'message' => 'No Basic Services Yet!',
            'data' => []
        ], 200);
        
    }

    //////////////////////////////////////////

    public function index(){
        $basicServices = BasicService::all();
        return view('basic_services' , compact('basicServices'));
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
    
    

        $BasicService = new BasicService;
        $BasicService->name = $request->name;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('Photos', 'basic_service_photo_' . time() . '.' . $extension, 'public'); // Store the file in the 'public/photos' directory
            $photoUrl = url('storage/' . $photoPath);
            $BasicService->photo = $photoUrl; 
        }
        $BasicService->save();

        return redirect()->route('basic.service.index');
        
        
    }


    public function edit($id){
        $BasicService = BasicService::find($id);
        if($BasicService !== null){
            return response()->json([
                'status' => 'success',
                'message' => '',
                'data' => $BasicService
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
        $BasicService = BasicService::find($id);
    
        if ($BasicService == null) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Basic Service not found',
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
   
    
        $BasicService->name = $request->name;
    
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('Photos', 'basic_service_photo_' . time() . '.' . $extension, 'public');
            $photoUrl = url('storage/' . $photoPath);
            $BasicService->photo = $photoUrl; 
        }
    
        $BasicService->save();
        if ($BasicService->exists){
        return response()->json([
            'status' => 'success',
            'message' => 'Basic Service updated successfully',
            'data' => $BasicService
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
        $BasicService = BasicService::find($id);
        $BasicService->delete();
    }

}
