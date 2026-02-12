<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $tasks = $user->tasks()->with('project')->get();

        $totalGeneral = 0;

        foreach ($tasks as $task) {

            $project = $user->projects()
                            ->where('projects.id', $task->project_id)
                            ->first();

            if ($project) {
                $rate = $project->pivot->rate;
                $task->rate = $rate;
                $task->total = $task->hours * $rate;
                $totalGeneral += $task->total;
            }
        }

        return view('dashboard', compact('tasks', 'totalGeneral'));
    }
}
