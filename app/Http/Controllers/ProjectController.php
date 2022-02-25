<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use Gate;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id')->paginate(6);
        return view('projects.index', compact('projects'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);

        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'target' => $request->target,
            'place' => $request->place,
            'date' => $request->date,
            'time' => $request->time
        ]);
        toast('Your Project was Added successfully !', 'success');
        return redirect(route('projects.index'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project, $id)
    {
        $project = Project::findOrFail($id);
        $members = $project->members;
        $partners = $project->partners;
        return view('projects.show', compact('project', 'members', 'partners'));
    }

    public function edit($project_id)
    {
        $project = Project::findOrFail($project_id);
        return view('projects.edit', compact('project'));
    }


    public function update(Request $request, $project_id)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'target' => $request->target,
            'place' => $request->place,
            'date' => $request->date,
            'time' => $request->time,
        ];
        $project = Project::findOrFail($project_id);
        $project->update($data);
        toast('Your project was Updated successfully !', 'success');
        return redirect(route('projects.index'));
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        toast('Your project was Deleted !', 'warning');
        return redirect(route('projects.index'));
    }
}
