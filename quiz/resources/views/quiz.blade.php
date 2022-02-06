<x-app-layout>
    <x-slot name="header">
        {{ $quiz->title }}
    </x-slot>
    <x-slot name="slot">
        <div class="card">
            <div class="card-body">
                <form method="POST">

                @foreach ($quiz->question as $question)

                    <strong>#{{ $loop->iteration }}</strong> {{ $question->question }}
                    @if ($question->image)
                        <img src="{{ asset($question->image) }}" style="width: 50%;" class="img-responsive" alt="">
                    @endif

                    <div class="form-check mt-2">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}1" value="answer1" required>
                        <label for="quiz{{ $question->id }}1" class="form-check-label">
                            {{ $question->answer1 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}2" value="answer2" required>
                        <label for="quiz{{ $question->id }}2" class="form-check-label">
                            {{ $question->answer2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}3" value="answer3" required>
                        <label for="quiz{{ $question->id }}3" class="form-check-label">
                            {{ $question->answer3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}4" value="answer4" required>
                        <label for="quiz{{ $question->id }}4" class="form-check-label">
                            {{ $question->answer4 }}
                        </label>
                    </div>
                    <hr>
                @endforeach

                <input type="submit" class="btn btn-success btn-block" value="Sınavı Bitir">

            </form>

            </div>
        </div>
    </x-slot>
</x-app-layout>
