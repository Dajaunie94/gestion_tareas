<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $project = \App\Models\Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => auth()->id()
        ]);

        return response()->json($project);
    }

    public function assignUser(Request $request, $projectId)
    {
        $project = \App\Models\Project::findOrFail($projectId);

        $project->users()->attach($request->user_id, [
            'rate' => $request->rate
        ]);

        return response()->json(['message' => 'Usuario asignado correctamente']);
    }


}
