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

}