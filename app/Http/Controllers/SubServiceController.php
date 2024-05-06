<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SubService;
use App\Models\BasicService;


class SubServiceController extends Controller
{
    //for mobile
    public function get_sub_services($id){
        $SubServices = SubService::where('basic_service_id','=',$id)->get();
        if(!$SubServices->isEmpty()){
            return response()->json([
                'status' => 'success',
                'message' => 'Sub Services retrieved successfully',
                'data' => $SubServices
            ], 200);
        }
        return response()->json([
            'status' => 'failed',
            'message' => 'No Sub Services Yet!',
            'data' => []
        ], 200);
        
    }



    ////////////////////////////////


    public function index(){
        $subServices = SubService::with('BasicService')->get();
        $basicServices = BasicService::all();
        return view('sub_services' , compact('subServices' , 'basicServices'));
    }

    public function store(Request $request)
    {

        $messages = [
            'name.required' => 'Please enter all Data*',
        ];

        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'photo' => ['required','image','mimes:jpeg,png,jpg,gif'], 
            'basic_service' => ['required'],
           ], $messages);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors(),
                ], 422);
            }
    

        $SubService = new SubService;
        $SubService->name = $request->name;
        $SubService->basic_service_id = $request->basic_service;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('Photos', 'sub_service_photo_' . time() . '.' . $extension, 'public'); // Store the file in the 'public/photos' directory
            $photoUrl = url('storage/' . $photoPath);
            $SubService->photo = $photoUrl; 
        }
        $SubService->save();

           
        
    }


    public function edit($id){
        $SubService = SubService::with('BasicService:id,name')->find($id);
        if($SubService !== null){
            return response()->json([
                'status' => 'success',
                'message' => '',
                'data' => $SubService
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
        $SubService = SubService::with('BasicService:id,name')->find($id);
    
        if ($SubService == null) {
            return response()->json([
                'status' => 'failed',
                'message' => 'sub Service not found',
                'data' => []
            ], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'photo' => ['nullable','image','mimes:jpeg,png,jpg,gif'], 
            'basic_service' => ['required'],
           ]);

        if ($validator->fails()) {
           return response()->json([
               'success'=>false,
               'message'=>"There exist one or more errors",
               'data'=>$validator->messages(),
           ],400);
       }
   
    
        $SubService->name = $request->name;
        $SubService->basic_service_id = $request->basic_service;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('Photos', 'sub_service_photo_' . time() . '.' . $extension, 'public');
            $photoUrl = url('storage/' . $photoPath);
            $SubService->photo = $photoUrl; 
        }
    
        $SubService->save();
        if ($SubService->exists){
        return response()->json([
            'status' => 'success',
            'message' => 'sub Service updated successfully',
            'data' => $SubService
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
        $SubService = SubService::find($id);
        $SubService->delete();

    }
}
