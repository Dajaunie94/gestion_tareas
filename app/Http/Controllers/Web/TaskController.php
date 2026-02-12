<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth; 

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        // Traemos los proyectos del usuario logueado
        $projects = auth()->user()->projects;

        // Pasamos los proyectos a la vista
        return view('tasks.create', compact('projects'));
    }


    public function store(Request $request)
    {
    
       Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'project_id' => $request->project_id,
            'user_id' => Auth::id(),
            'hours' => $request->hours, 
        ]);

        return redirect()->route('tasks.index');
    }

    
}
