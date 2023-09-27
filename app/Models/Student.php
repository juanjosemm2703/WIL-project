<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    function roles(){
        return $this->belongsToMany(Role::class, 'role_student','student_id', 'role_id','user_id');
    }
    function applications(){
        return $this->belongsToMany(Project::class, 'applications','student_id', 'project_id','user_id')->withPivot('justification');
    }
}
