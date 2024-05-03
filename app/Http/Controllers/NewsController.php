<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;


class NewsController extends Controller
{
    public function index(){
        $news = News::all();
        if(!$news->isEmpty()){
            return response()->json([
                'status' => 'success',
                'message' => 'News retrieved successfully',
                'data' => $news
            ], 200);
        }
        return response()->json([
            'status' => 'faild',
            'message' => 'No News Yet!',
            'data' => []
        ], 200);
        
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => ['required','string'], 
            'description'=>['nullable','string'],
            'photo' => ['nullable','image','mimes:jpeg,png,jpg,gif'], 
           ]);

        if ($validator->fails()) {
           return response()->json([
               'success'=>false,
               'message'=>"There exist one or more errors",
               'data'=>$validator->messages(),
           ],400);
       }
    

        $news = new News;
        $news->title = $request->title;
        $news->description = $request->description;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('Photos', 'news_photo_' . time() . '.' . $extension, 'public'); // Store the file in the 'public/photos' directory
            $news->photo = $photoPath;
        }
        $news->save();

        if ($news->exists){
            return response()->json([
                'status' => 'success',
                'message' => 'News added successfully',
                'data' => $news
            ], 201);
        }
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong , Try Again!',
                'data' => []
            ], 500);
        
        
    }


    public function edit($id){
        $news = News::find($id);
        if($news !== null){
            return response()->json([
                'status' => 'success',
                'message' => '',
                'data' => $news
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
        $news = News::find($id);
    
        if ($news == null) {
            return response()->json([
                'status' => 'failed',
                'message' => 'News not found',
                'data' => []
            ], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'title' => ['required','string'], 
            'description'=>['nullable','string'],
            'photo' => ['nullable','image','mimes:jpeg,png,jpg,gif'], 
           ]);

        if ($validator->fails()) {
           return response()->json([
               'success'=>false,
               'message'=>"There exist one or more errors",
               'data'=>$validator->messages(),
           ],400);
       }
   
    
        $news->title = $request->title;
        $news->description = $request->description;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('Photos', 'News_photo_' . time() . '.' . $extension, 'public');
            $news->photo = $photoPath;
        }
    
        $news->save();
        if ($news->exists){
        return response()->json([
            'status' => 'success',
            'message' => 'News updated successfully',
            'data' => $news
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
        $news = News::find($id);

        if ($news == null) {
            return response()->json([
                'status' => 'failed',
                'message' => 'News not found',
                'data' => []
            ], 404);
        }

        $news->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'News deleted successfully',
            'data' => []
        ], 200);
    }

    
}