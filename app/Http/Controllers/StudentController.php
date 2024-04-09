<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * StudentController Constructor, setting up required middlewares.
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('checkUserType:Teacher',['only'=>['index']]);
        $this->middleware('checkUserType:Student',['only'=>['edit', 'update']]);
        $this->middleware('validateStudent',['only'=>['edit','update']]);
        $this->middleware('studentProfile',['only'=>['show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(5);
        return view('student.index')->with('students', $students);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::where('user_id', $id)->first();
        return view('profile.student')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::where('user_id', $id)->first();
        $roles = Role::all();
        return view('student.edit')->with('student', $student)->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string','min:5','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'gpa' => ['numeric', 'between:0,7'],
            'roles' => ['array','in:1,2,3,4,5'],
        ]);

        $student = Student::where('user_id', $id)->first();
        $student->user->name= $request->name;
        $student->user->email= $request->email;
        $student->user->save();
       
        $student->roles()->detach();
        $student->roles()->attach($request->roles, ['created_at' => now(), 'updated_at' => now()]);
        $student->GPA = $request->gpa;
        $student->save();

        return redirect(route('student.show', ['id' => $id]));
    }

}
