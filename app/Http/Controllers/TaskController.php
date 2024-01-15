<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Http\Requests\FormTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $Projects = Project::all();
        $Tasks = Task::with('project')->get();
        return view('Tasks.index', compact('Tasks', 'Projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Projects = Project::all();
        return view('Tasks.create', compact('Projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormTaskRequest $request)
    {
        // dd($request->validated());
        Task::create($request->validated());
        return redirect('tâches')->with('success', 'Tâche créée avec succès !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $Projects = Project::all();
        return view('Tasks.edit', compact('task', 'Projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormTaskRequest $request, Task $task)
    {
        // dd($task);
        $task->update($request->validated());
        return redirect('/')->with('success', 'Tâche update avec succès !');
    }

    public function show(Task $task)
    {
        $Projects = Project::all();
        return view('Tasks.show', compact('task', 'Projects'));
    }


}