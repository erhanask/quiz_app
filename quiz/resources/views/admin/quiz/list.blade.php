<x-app-layout>
    <x-slot name="header">
        Quizler
    </x-slot>

    <x-slot name="slot">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{ route('quizzes.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Quiz Oluştur
                    </a>
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Quiz</th>
                                    <th scope="col">Durum</th>
                                    <th scope="col">Soru Sayısı</th>
                                    <th scope="col">Bitiş Tarihi</th>
                                    <th scope="col">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quizzes as $quiz)
                                <tr>
                                    <td>{{ $quiz->title }}</td>
                                    <td>
                                        @switch($quiz->status)
                                            @case('publish')
                                                <span class="badge bg-success">Aktif</span>
                                                @break
                                            @case('passive')
                                            <span class="badge bg-secondary">Pasif</span>
                                                @break
                                            @case('draft')
                                                <span class="badge bg-warning">Taslak</span>
                                                @break
                                            @default
                                            <span class="badge bg-light">-**</span>                    
                                        @endswitch
                                        {{-- {{ $quiz->status }} --}}
                                    </td>
                                    <td>{{ $quiz->question_count }}</td>
                                    <td title="{{$quiz->finished}}">{{ $quiz->finished ? $quiz->finished->diffForHumans() : "-" }}</td>
                                    <td>
                                        <a href="{{ route("questions.index",$quiz->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-question-circle"></i></a>
                                        <a href="{{ route("quizzes.edit",$quiz->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                        <a href="{{ route("quizzes.delete",$quiz->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$quizzes->links()}}
                    </div>
                </h5>
            </div>
        </div>

    </x-slot>
</x-app-layout>
