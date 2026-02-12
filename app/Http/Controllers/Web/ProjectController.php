<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;



class ProjectController extends Controller
{
   public function index()
    {
        $projects = Auth::user()->projects; 

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rate' => 'required|numeric|min:0'
        ]);

        $project = Project::create([
            'name' => $request->name
        ]);

        Auth::user()->projects()->attach($project->id, [
            'rate' => $request->rate
        ]);

        return redirect()->route('projects.index');
    }

    public function assignUserForm(Project $project)
    {
        $users = User::whereDoesntHave('projects', function ($query) use ($project) {
            $query->where('project_id', $project->id);
        })->get();

        return view('projects.assign', compact('project', 'users'));
    }

    public function assignUser(Request $request, Project $project)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'rate' => 'required|numeric|min:0'
        ]);

        $project->users()->attach($request->user_id, [
            'rate' => $request->rate
        ]);

        return redirect()->route('projects.index')
                        ->with('success', 'Usuario asignado correctamente');
    }

        public function assignForm(Project $project)
    {
        $users = User::all(); // todos los usuarios

        return view('projects.assign', compact('project', 'users'));
    }

        public function assign(Request $request, Project $project)
    {
        $project->users()->attach($request->user_id, [
            'rate' => $request->rate
        ]);

        return redirect()->route('projects.index')
                        ->with('success', 'Usuario asignado correctamente');
    }

}

