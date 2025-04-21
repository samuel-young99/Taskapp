<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
       $tasks = Task::all();
        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $data = $request->all();
        $data['completed'] = $request->has('completed');
        Task::create($data);
        return redirect()-> route('tasks.index')->with('success', 'Todo created successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, task $task)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $data = $request->all();
        $data['completed'] = $request->has('completed');
        $task-> update($data);
        return redirect()-> route('tasks.index')->with('success', 'Todo updated successful');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task-> delete();
        return redirect()-> route('tasks.index')->with('success', 'Todo deleted successful');   
    }
}
