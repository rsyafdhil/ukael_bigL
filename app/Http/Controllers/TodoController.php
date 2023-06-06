<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $todos = Todo::query();

        if ($request->has('search')){
            // $todos->where('todo', 'Like', "%{$request->search}%")->orWhere('deadline', 'Like', "%{$request->search}%")->orWhere('note', 'Like', "%{$request->search}%")->orWhere('status', 'Like', "%{$request->search}%");
            $todos->where('todo', 'Like', "%{$request->search}%")->orWhere('deadline', 'Like', "%{$request->search}%")->orWhere('note', 'Like', "%{$request->search}%");
        }

        return view('list.index', [
            'todos' => $todos->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('list.create', [
            'statuses' => Status::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photopath='';
        if($request->hasFile('photo')){
            $photopath = $request->file('photo')->store('photos');
        }

        $todos = new Todo();

        $todos->todo = $request->todo;
        $todos->deadline = $request->deadline;
        $todos->note = $request->note;
        $todos->photo = $photopath;
        $todos->status_id = $request->status_id;

        $todos->save();

        return redirect()->route('list.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $todos = Todo::find($id);

        return view('list.edit', [
            'todos' => $todos,
            'statuses' => Status::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $photopath='';

        $todos = Todo::find($id);

        if($request->hasFile('photo')){
            if (Storage::exists($todos->photo)){
                Storage::delete($todos->photo);
            }
            $photopath = $request->file('photo')->store('photos');
        }
        

        $todos->todo = $request->todo;
        $todos->deadline = $request->deadline;
        $todos->note = $request->note;
        $todos->photo = $photopath;
        $todos->status_id = $request->status_id;

        $todos->save();

        return redirect()->route('list.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $todos = Todo::find($id);

        $todos->delete();

        return redirect()->route('list.index');
    }
}
