<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;

class ApplicationController extends Controller
{
    /**
     * ApplicationController Constructor, setting up required middlewares.
    */
    
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('checkUserType:Student');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $project_id)
    {
        $student = Student::where('user_id', auth()->user()->id)->first();
        $project = Project::find($project_id);
        $errors = 0;
        $validator = Validator::make([], []);

        if ($student->GPA == null) {
            $errors++;
            $validator->errors()->add('gpa', 'GPA is required for applying.');
        }
        if (count($student->roles) == 0) {
            $errors++;
            $validator->errors()->add('roles', 'At least one role is required.');
        }

        if ($errors > 0) {
            return redirect(route('student.edit', ['id' => auth()->user()->id]))
                ->withErrors($validator)
                ->withInput();
        }

        if(count($student->applications)<3){
            return view('application.create')->with('project', $project)->with('student', $student);
        }else{
            $newvalidator = Validator::make([], []);
            $newvalidator->errors()->add('condition', 'You can not apply to work more than 3 projects.');
            return redirect(route('project.show', ['id' => $project_id]))
                ->withErrors($newvalidator)
                ->withInput();
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'justification' => ['required', 'string', 'min:5'],
        ]);
        $project = Project::find($request->project_id);
        $student_id = auth()->user()->id;
        $project->applications()->syncWithoutDetaching([$student_id=>[
            'justification'=>$request->justification,
        ]
        ]);
        return redirect(route('project.show', ['id' => $request->project_id]));
    }


}
