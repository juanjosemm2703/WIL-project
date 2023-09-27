<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    function partner(){
        return $this->belongsTo(Partner::class,'partner_id', 'user_id');
    }
    function applications(){
        return $this->belongsToMany(Student::class, 'applications', 'project_id','student_id','id','user_id')->withPivot('justification');
    }
}
