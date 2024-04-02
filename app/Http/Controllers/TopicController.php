<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Topic;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class TopicController extends Controller
{


    public function index(){

        $activities = Activity::all()->sortByDesc('activity_id');
        $topics = Topic::all()->sortByDesc('id'); 
        return view('/community', ['topics' => $topics, 'activities' => $activities]);
        
    }

    

    public function store(Request $request){

        // dd($request);

        $data = $request->validate([
            'title' => 'required|min:3|max:30',
            'description' => 'required|min:3|max:255', 
            'category' => 'required|min:3|max:30',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);
        // FOR MULTPILE FILES = NOT YET FIGURED OUT

        // if ($request->hasFile('files')) {
        //     $uploadedFiles = $request->file('files');

        //     // Perform actions with the uploaded files
        //     foreach ($uploadedFiles as $file) {
        //         // Example: Store the file
        //         $file->store()->public_path('uploads');
        //     }

        //     // Or you can return the files in the response
        //     return response()->json(['message' => 'Files uploaded successfully']);
        // }

        // return response()->json(['message' => 'No files were uploaded'], 400);

        $imageName = time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('uploads'), $imageName);

        $newTopic = Topic::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'category' => $data['category'],
            'image_path' => 'uploads/' . $imageName,
        ]);

        return redirect()->back()->with('success', 'Post created!');
        
    }
}
