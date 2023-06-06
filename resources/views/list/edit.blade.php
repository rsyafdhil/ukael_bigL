@extends('templates.default')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('list.update', $todos->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Todo</label>
                <input type="text" name="todo" class="form-control" placeholder="Kamu mau ngapain aja hari ini?" value="{{ $todos->todo }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Deadline</label>
                <input type="text" name="deadline" placeholder="Kapan Deadlinenya?" id="" class="form-control" value="{{ $todos->deadline }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Note</label>
                <input type="text" name="note" class="form-control " placeholder="Kasih Note Disini..." value="{{ $todos->note }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Status</label>
                <select name="status_id" id="" class="form-control">
                    @foreach ($statuses as $st)
                    <option value="{{ $st->id }}" @selected ($st->id == $st->Status)>{{ $st->status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Foto</label>
                <img src="{{ asset('storage/'.$todos->photo) }}" width="100px" alt=""> 
                <input type="file" name="photo" class="form-control" value="{{ old('photo') }}">
            </div>

            <div class="mb-3">
                <input type="submit" value="Simpan" class="btn btn-info">
            </div>
        </form>
    </div>
</div>
@endsection