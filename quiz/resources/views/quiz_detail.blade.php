<x-app-layout>
    <x-slot name="header">
        Anasayfa
    </x-slot>

    <x-slot name="slot">
        <div class="card">
            <div class="card-body">
                <p class="card-text">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                            @if ($quiz->my_result)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sınav Puanı
                                <span class="badge bg-primary badge-pill">
                                    {{$quiz->my_result->point}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Doğru / Yanlış
                                <div class="float-right">
                                    <span class="badge bg-success badge-pill">
                                        {{$quiz->my_result->correct}}
                                    </span>
                                    <span class="badge bg-danger badge-pill">
                                        {{$quiz->my_result->wrong}}
                                    </span>
                                </div>
                            </li>
                            @endif
                            @if ($quiz->finished)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Son Katılım Tarihi
                                <span class="badge bg-secondary badge-pill">
                                    {{$quiz->finished->diffForHumans()}}
                                </span>
                            </li>
                            @endif
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Soru Sayısı
                                <span class="badge bg-secondary badge-pill">
                                    {{$quiz->question_count}}
                                </span>
                            </li>
                            @if ($quiz->details['average'])
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Katılımcı Sayısı
                                <span class="badge bg-secondary badge-pill">
                                    {{ $quiz->details['average'] }}
                                </span>
                            </li>
                            @endif
                            @if ($quiz->details['join_count'])
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Ortalama Puan
                                <span class="badge bg-secondary badge-pill">
                                    {{$quiz->details['join_count']}}
                                </span>
                            </li>
                            @endif
                        </ul>

                        @if (count($quiz->topTen))                            
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="card-title">
                                    <ul class="list-group">
                                        @foreach ($quiz->topTen as $result)
                                         <li class="list-group-item">
                                            <strong>{{$loop->iteration}}</strong>
                                            {{$result->user->name}}
                                            <div class="badge bg-light text-dark text-right">{{$result->point}}</div>
                                        </li>   
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif


                    </div>
                    <div class="col-md-8">
                        {{$quiz->description}}
                        <div class="mt-3">
                            @if ($quiz->my_result)
                            <a href="{{ route('quiz.join',$quiz->slug) }}" class="btn btn-warning w-100">Quizi İncele</a>
                            @else
                            <a href="{{ route('quiz.join',$quiz->slug) }}" class="btn btn-primary w-100">Quize Katıl</a>                                
                            @endif
                        </div>
                    </div>
                </div>
                </p>
            </div>
        </div>
    </x-slot>
</x-app-layout>