<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function dashboard()
    {
        $quizzes = Quiz::where('status', 'publish')->withCount('question')->paginate(5);
        return view('dashboard', compact('quizzes'));
    }

    public function quiz($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('question')->first();
        return view('quiz', compact('quiz'));
    }

    public function result(Request $request, $slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('question')->first() ?? abort(404, "Quiz Bulunamadı.");
        $correct = 0;


        if ($quiz->my_result) {
            abort(404,"Quiz'e erişiminiz bulunmuyor.");
        }


        foreach ($quiz->question as $question) {
            // echo  $question->id." - ".$question->correct_answer." ";
            Answers::create([
                'user_id' => auth()->user()->id,
                'question_id' => $question->id,
                'answer' => $request->post($question->id),
            ]);


            if ($question->correct_answer === $request->post($question->id)) {
                $correct++;
            }
        }

        $point = round((100 / count($quiz->question)) * $correct);
        $wrong = count($quiz->question) - $correct;

        Result::create([
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,
            'point' => $point,
            'correct' => $correct,
            'wrong' => $wrong
        ]);

        return redirect()->route('quiz.detail', $quiz->slug)->withSuccess('Quiz Sonucunuz : ' . $point);
    }

    public function quiz_detail($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with(['my_result','results','topTen.user'])->withCount('question')->first() ?? abort(404, "Quiz Bulunamadı.");
        return view('quiz_detail', compact('quiz'));
    }
}
