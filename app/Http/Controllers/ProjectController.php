<?php

namespace App\Http\Controllers;

use App\Project;
use App\Http\Resources\Project as ProjectResource;
use App\Http\Resources\User_project as UserProjectResource;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function listProjects()
    {
        $projects = Project::all();
        if ($projects->isEmpty()) {
            return response()->json(['message' => 'Resource not found'], 404);
        }

        $projectsCollection = ProjectResource::collection($projects);
        return response()->json($projectsCollection, 200);
    }

    public function listActiveProjects()
    {
        $projects = Project::all()->where('active', '==', '1');
        if ($projects->isEmpty()) {
            return response()->json(['message' => 'Resource not found'], 404);
        }

        $projectsCollection = ProjectResource::collection($projects);
        return response()->json($projectsCollection, 200);
    }

    public function findProject($project)
    {
        if (!Project::find($project)) {
            return response()->json(['message' => 'Project not found'], 404);
        }
        return response()->json(new ProjectResource(Project::find($project)), 200);
    }

    public function findUsersProject($project)
    {
        $project = Project::find($project);
        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        if ($project->users->isEmpty()) {
            return response()->json(['message' => 'Project has not been assigned to any user yet'], 404);
        }

        $usersCollection = UserProjectResource::collection($project->users);
        return response()->json($usersCollection, 200);
    }

    public function addProject(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:projects|string',
                'desc' => 'required|string',
                'deadline' => 'required|date|after:today'
            ]
        );

        $project = new Project(
            [
                'name' => $request->name,
                'desc' => $request->desc,
                'deadline' => $request->deadline,
                'active' => true
            ]
        );

        try {
            $project->save();
        } catch (\Exception $e) {
            return response()->json($e->getMessage, 500);
        }

        return response()->json(
            [
                'message' => 'Project successfully created',
                'link' => url('/api/projects/' . $project->id)
            ]
        );
    }

    public function updateProjectInfo(Request $request, $project)
    {
        $request->validate(
            [
                'name' => 'required|unique:projects|string',
                'desc' => 'required|string',
                'deadline' => 'required|date|after:today',
                'active' => 'required|boolean'
            ]
        );

        $project = Project::find($project);
        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        $project->name = $request->name;
        $project->desc = $request->desc;
        $project->deadline = $request->deadline;
        $project->active = $request->active;

        try {
            $project->save();
        } catch (\Exception $e) {
            return response()->json($e->getMessage, 500);
        }

        return response()->json(
            [
                'message' => 'Project data successfully updated.',
                'link' => url('/api/projects/' . $project->id)
            ]
        );
    }

    public function deleteUser($project)
    {
        $project = Project::find($project);
        if (!$project) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $project->active = false;
        //Bring relationship and modify it
        //$project->users->
        try {
            $project->save();
        } catch (\Exception $e) {
            return response()->json($e->getMessage, 500);
        }
        return response()->json(
            [
                'message' => 'Project successfully disabled.',
                200
            ]
        );
    }
}
