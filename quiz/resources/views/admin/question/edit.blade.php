<x-app-layout>
    <x-slot name="header">
        {{$question->question}} - Sorusunu düzenle
    </x-slot>

    <x-slot name="slot">

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('questions.update',[$question->quiz_id,$question->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Soru</label>
                        <textarea name="question" class="form-control" rows="4">{{ $question->question }}</textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label>Fotoğraf (Varsa)</label>
                        <div class="row">
                            <div class="col-md-4 text-center shadow">
                                @if ($question->image)
                                <img style="width: 100%;height:20rem;" class="img-fluid"
                                    src="{{asset($question->image)}}" alt="">
                                @endif
                            </div>

                            <div class="col-md-8">
                                <input type="file" name="image" class="form-control mt-5">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4 mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>1.Cevap</label>
                                <textarea name="answer1" class="form-control"
                                    rows="2">{{ $question->answer1 }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>2.Cevap</label>
                                <textarea name="answer2" class="form-control"
                                    rows="2">{{ $question->answer2 }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>3.Cevap</label>
                                <textarea name="answer3" class="form-control"
                                    rows="2">{{ $question->answer3 }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>4.Cevap</label>
                                <textarea name="answer4" class="form-control"
                                    rows="2">{{ $question->answer4 }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <select name="correct_answer" class="form-control">
                            <option @if($question->correct_answer == "answer1") selected @endif value="answer1">1.Cevap
                            </option>
                            <option @if($question->correct_answer == "answer2") selected @endif value="answer2">2.Cevap
                            </option>
                            <option @if($question->correct_answer == "answer3") selected @endif value="answer3">3.Cevap
                            </option>
                            <option @if($question->correct_answer == "answer4") selected @endif value="answer4">4.Cevap
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success btn-block mt-2" value="KAYDET" required>
                    </div>
                </form>
            </div>
        </div>

    </x-slot>

    <x-slot name="js">

    </x-slot>

</x-app-layout>