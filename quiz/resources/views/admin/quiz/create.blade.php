<x-app-layout>
    <x-slot name="header">
        Quiz Oluştur
    </x-slot>

    <x-slot name="slot">

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('quizzes.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Quiz Başlığı</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">

                        <label>Quiz Açıklama</label>
                        <textarea type="text" name="description" class="form-control"
                            rows="4">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="isFinished" @if (old('finished_at') !== null)checked @endif> Bitiş Tarihi Olacak Mı ?
                    </div>
                    <div id="finished_atInput" @if (old('finished_at') == null)style="display: none;" @endif class="form-group">
                        <label>Bitiş Tarihi</label>
                        <input type="datetime-local" name="finished" class="form-control"
                            value="{{ old('finished_at') }}">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success btn-block mt-2" value="KAYDET" required>
                    </div>
                </form>
            </div>
        </div>

    </x-slot>

    <x-slot name="js">
        <script>
            $("#isFinished").change(function(e) {
                if ($("#isFinished").is(":checked")) {
                    $("#finished_atInput").show();
                } else {
                    $("#finished_atInput").hide();
                }
            })
        </script>

    </x-slot>

</x-app-layout>
