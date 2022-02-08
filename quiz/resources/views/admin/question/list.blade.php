<x-app-layout>
    <x-slot name="header">
        {{ $quiz->title }} Testine Ait Sorular
    </x-slot>
    <x-slot name="slot">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{ route('questions.create', $quiz->id) }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Soru Oluştur
                    </a>
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Soru</th>
                                    <th scope="col">Fotoğraf</th>
                                    <th scope="col">Cevap 1</th>
                                    <th scope="col">Cevap 2</th>
                                    <th scope="col">Cevap 3</th>
                                    <th scope="col">Cevap 4</th>
                                    <th scope="col">Doğru Cevap</th>
                                    <th scope="col">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quiz->question as $question)
                                    <tr>
                                        <td>{{ $question->question }}</td>
                                        <td>
                                            @if ($question->image)
                                                <a href="/{{ $question->image }}" target="_blank" class="btn btn-sm btn-secondary">Görüntüle</a>
                                            @else
                                            <button disabled class="btn btn-sm btn-light">Görüntüle</button>
                                            @endif                                            
                                        </td>
                                        <td>{{ $question->answer1 }}</td>
                                        <td>{{ $question->answer2 }}</td>
                                        <td>{{ $question->answer3 }}</td>
                                        <td>{{ $question->answer4 }}</td>
                                        <td class="text-success">{{ substr($question->correct_answer,-1) }} . Cevap</td>
                                        <td>
                                            <a href="{{ route('questions.edit', [$quiz->id,$question->id]) }}"
                                                class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                            <a href="{{ route('questions.delete', [$quiz->id,$question->id]) }}"
                                                class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </h5>
            </div>
        </div>

    </x-slot>
</x-app-layout>
