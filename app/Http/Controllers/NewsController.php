<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;


class NewsController extends Controller
{
    public function index(){
        $news = News::all();
        return view('news',compact('news'));
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => ['required','string'], 
            'description'=>['required','string'],
            'photo' => ['required','image','mimes:jpeg,png,jpg,gif'], 
           ]);

       

        $news = new News;
        $news->title = $request->title;
        $news->description = $request->description;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('Photos', 'news_photo_' . time() . '.' . $extension, 'public'); // Store the file in the 'public/photos' directory
            $photoUrl = url('storage/' . $photoPath);
            $news->photo = $photoUrl; 
        }
        $news->save();

        return redirect()->back();
        
    }


    public function edit($id){
        $news = News::find($id);
        return response()->json($news);
    }



    public function update(Request $request)
    {
        $news = News::find($request->news_id);
        

        $validator = Validator::make($request->all(), [
            'title' => ['required','string'], 
            'description'=>['required','string'],
            'photo' => ['nullable','image','mimes:jpeg,png,jpg,gif'], 
           ]);

       
   
    
        $news->title = $request->title;
        $news->description = $request->description;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('Photos', 'news_photo_' . time() . '.' . $extension, 'public');
            $photoUrl = url('storage/' . $photoPath);
            $news->photo = $photoUrl; 
                }
    
        $news->save();
        return redirect()->back();
    }


    public function delete($id)
    {
        $news = News::find($id);
        $news->delete();

    }

    
}