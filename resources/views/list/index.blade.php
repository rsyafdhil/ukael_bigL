@extends('templates.default')

@section('content')
    <div class="col-lg-8 mx-auto">
        <form action="">
            <input type="text" name="search" placeholder="Cari list..." class="form-control" value={{ request('search') }}>
            <input type="submit" value="Search" class="btn btn-primary text-center  mb-3">
        </form>
                <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                        <th>Todo</th>
                        <th>Deadline</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>foto</th>
                        <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todos as $to)
                            
                        <tr>
                        <td>{{ $to->todo }}</td>
                        <td class="text-muted">
                            {{ $to->deadline }}
                        </td>
                        <td class="text-muted">{{ $to->note }}</td>
                        <td>
                            {{ $to->Status->status }}
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $to->photo) }}" width="50px" alt="">
                        </td>
                        <td>
                            <a class="btn btn-sm btn-blue" href="{{ route('list.edit', $to->id) }}">Edit</a>
                            <form action="{{ route('list.destroy', ['list' => $to->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                        </form>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
                {{ $todos->links() }}
            </div>
@endsection