<x-app-layout>
    <x-slot name="header">
        Anasayfa
    </x-slot>

    <x-slot name="slot">
        <div class="row">
            <div class="col-md-8">
                @foreach ($quizzes as $quiz)
                <div class="list-group">
                    <a href="{{ route('quiz.detail',$quiz->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{$quiz->title}}</h5>
                            <small>{{$quiz->finished ? $quiz->finished->diffForHumans().' bitiyor.' : null}}</small>
                        </div>
                        <p class="mb-1">
                            {{$quiz->description}}
                        </p>
                    </a>
                </div>
                @endforeach
                <div class="mt-3">
                    {{$quizzes->links()}}
                </div>
            </div>
            <div class="col-md-4">
                DURUM PUAN FALAN
            </div>
        </div>
    </x-slot>
</x-app-layout>