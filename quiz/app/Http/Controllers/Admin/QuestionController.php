<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $quiz = Quiz::whereId($id)->with('question')->first() ?? abort(404,"Quiz Bulunamadı");
        return view("admin.question.list",compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quiz_id)
    {
        $quiz = Quiz::find($quiz_id);
        return view("admin.question.create",compact("quiz"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request,$id)
    {
        //Resim Request ile geldiyse
        if ($request->hasFile("image")) {
            
            //Resim adınız slug ile temzileyip alıyoruz ve extension ile birleştiriyoruz.
            $fileName= Str::slug($request->question).".".$request->image->extension();
            
            //Resim yolunu beliritiyoruz veritabanı için.
            $fileNameWithUpload = "uploads/".$fileName;

            //Resim yolunu beliritiyoruz veritabanı için.
            $request->image->move(public_path('uploads'),$fileName);
        
            $request->merge([
                "image" => $fileNameWithUpload
            ]);
        }
        $quiz = Quiz::find($id);

        //Request post diyince çalışıyor.
        // $quiz->question()->create($request->all());
        $quiz->question()->create($request->post());
        return redirect()->route("questions.index",$id)->withSuccess("Soru başarıyla oluşturuldu");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($quiz_id , $id)
    {
        return "$quiz_id  -  $id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id,$question_id)
    {
        $question = Quiz::find($quiz_id)->question()->find($question_id) ?? abort(404 ,"Quiz Veya Soru Bulunamadı.");
        return view("admin.question.edit",compact("question"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, $quiz_id,$question_id)
    {
        //Resim Request ile geldiyse
        if ($request->hasFile("image")) {
            
            //Resim adınız slug ile temzileyip alıyoruz ve extension ile birleştiriyoruz.
            $fileName= Str::slug($request->question).".".$request->image->extension();
            
            //Resim yolunu beliritiyoruz veritabanı için.
            $fileNameWithUpload = "uploads/".$fileName;

            //Resim yolunu beliritiyoruz veritabanı için.
            $request->image->move(public_path('uploads'),$fileName);
        
            $request->merge([
                "image" => $fileNameWithUpload
            ]);
        }
        $quiz = Quiz::find($quiz_id);

        //Request post diyince çalışıyor.
        // $quiz->question()->create($request->all());
        $quiz->question()->find($question_id)->update($request->post());
        return redirect()->route("questions.index",$quiz_id)->withSuccess("Soru başarıyla güncellendi .");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function delete($quiz_id ,$question_id)
    {

        $quiz = Quiz::find($quiz_id) ?? abort(404,"Quiz Bulunamadı.");
        $quiz->question()->find($question_id)->delete();
        return redirect()->route("questions.index",$quiz_id)->withSuccess("Soru Başarıyla Silindi.");

    }
}
