@extends('templates.default')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('list.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label for="" class="form-label">Todo</label>
                <input type="text" name="todo" class="form-control" placeholder="Kamu mau ngapain aja hari ini?">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Deadline</label>
                <input type="text" name="deadline" placeholder="Kapan Deadlinenya?" id="" class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Note</label>
                <input type="text" name="note" class="form-control " placeholder="Kasih Note Disini...">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Status</label>
                <select name="status_id" id="" class="form-control">
                    @foreach ($statuses as $st)
                        <option value="{{ $st->id }}">{{ $st->status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Foto</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <div class="mb-3">
                <input type="submit" value="Simpan" class="btn btn-info">
            </div>
        </form>
    </div>
</div>
@endsection