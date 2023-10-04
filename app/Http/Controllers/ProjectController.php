<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Rules\WordCountRule;
use App\Rules\UniqueProjectNameRule;
use Illuminate\Support\Facades\DB;
use App\Models\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects =  Project::all()->sortBy([['year', 'desc'],['trimestre', 'desc']])->groupBy(['year','trimestre']);
        return view('project.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5',new UniqueProjectNameRule($request->trimestre, $request->year)],
            'students' => ['required', 'in:3,4,5,6'],
            'description' => ['required', new WordCountRule(3)],
            'year' => ['required'],
            'trimestre' => ['required', 'in:1,2,3'],
            'files.*' => ['mimes:jpeg,png,pdf'],
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->students_needed = $request->students;
        $project->description = $request->description;
        $project->year = $request->year;
        $project->partner_id = auth()->user()->id;
        $project->trimestre = $request->trimestre;
        $project->created_at = now();
        $project->save();


        if ($request->hasFile('files')) {
        $files = $request->file('files');
        foreach ($files as $file) {
            $file_storage = $file->store('files','public');
            if($file->extension() == "jpg" or $file->extension() == "png"){
                $type = 'image'; 
            }else{
                $type = 'pdf';
            }
            $newFile = new File();
            $newFile->project_id = $project->id;
            $newFile->type = $type;
            $newFile->file_path = $file_storage;
            $newFile->created_at = now();
            $newFile->save();
        }
        }

        return redirect(route('project.show', ['id' => $project->id]));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        return view('project.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        return view('project.edit')->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5',new UniqueProjectNameRule($request->trimestre, $request->year)],
            'students' => ['required', 'in:3,4,5,6'],
            'description' => ['required', new WordCountRule(3)],
            'year' => ['required'],
            'trimestre' => ['required', 'in:1,2,3'],
        ]);
        $project = Project::find($id);
        $project->title = $request->title;
        $project->students_needed = $request->students;
        $project->description = $request->description;
        $project->year = $request->year;
        $project->trimestre = $request->trimestre;
        $project->save();

        return redirect(route('project.show', ['id' => $id]));
    }

    public function destroy(string $id)
    {
        $project = Project::find($id);
        $applications = $project->applications;
        if(count($applications) > 0 ){
            return back()->withErrors(['application'=>'Project has students applied']);
        }
        $partner_id = $project->partner->user_id;
        $project->delete();
        return redirect(route('partner.show', ['id' => $partner_id]));
    }
}
