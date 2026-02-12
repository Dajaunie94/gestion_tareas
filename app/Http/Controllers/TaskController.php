<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TaskController extends Controller
{
   

  public function getUserTasks($id)
    {
        $user = \App\Models\User::with(['projects.tasks'])->findOrFail($id);

        $result = [];

        foreach ($user->projects as $project) {

            $rate = $project->pivot->rate;

            foreach ($project->tasks as $task) {

                $value = $task->hours * $rate;

                $result[] = [
                    'task' => $task->title,
                    'project' => $project->name,
                    'hours' => $task->hours,
                    'rate' => $rate,
                    'value' => $value
                ];
            }
        }

        return response()->json($result);
    }

    public function store(Request $request)
    {
        $task = \App\Models\Task::create([
            'title' => $request->title,
            'hours' => $request->hours,
            'project_id' => $request->project_id,
            'user_id' => auth()->id()
        ]);

        return response()->json($task);
    }

    public function myTasks()
    {
        $user = auth()->user()->load('projects.tasks');

        $result = [];

        foreach ($user->projects as $project) {

            $rate = $project->pivot->rate;

            foreach ($project->tasks->where('user_id', $user->id) as $task) {

                $value = $task->hours * $rate;

                $result[] = [
                    'task' => $task->title,
                    'project' => $project->name,
                    'hours' => $task->hours,
                    'rate' => $rate,
                    'value' => $value
                ];
            }
        }

        return response()->json($result);
    }





}
