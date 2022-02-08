<x-app-layout>
    <x-slot name="header">
        Anasayfa
    </x-slot>

    <x-slot name="slot">
        <div class="card" >
            <div class="card-body">
                <p class="card-text">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-group">
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
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Katılımcı Sayısı
                                    <span class="badge bg-secondary badge-pill">
                                        22
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Ortalama Puan
                                    <span class="badge bg-secondary badge-pill">
                                        22
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            {{$quiz->description}}
                            <div class="mt-3">
                                <a href="{{ route('quiz.join',$quiz->slug) }}" class="btn btn-primary w-100">Quize Katıl</a>
                            </div>
                        </div>
                    </div>
                </p>
            </div>
        </div>
    </x-slot>
</x-app-layout>