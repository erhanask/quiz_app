<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class MainController extends Controller
{
    
    public function dashboard(){
        $quizzes = Quiz::where('status','publish')->withCount('question')->paginate(5);
        return view('dashboard',compact('quizzes'));
    }

    public function quiz($slug){
        $quiz = Quiz::whereSlug($slug)->with('question')->first();
        return view('quiz',compact('quiz'));
    }

    public function result($slug){
        return $slug;
    }

    public function quiz_detail($slug){
        $quiz = Quiz::whereSlug($slug)->withCount('question')->first() ?? abort(404,"Quiz Bulunamadı.");
        return view('quiz_detail',compact('quiz'));
    }

}
