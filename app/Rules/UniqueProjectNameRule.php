<?php

namespace App\Rules;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueProjectNameRule implements ValidationRule
{
    protected $trimestre;
    protected $year;

    public function __construct($trimestre, $year, $id=null)
    {
        $this->trimestre = $trimestre;
        $this->year = $year;   
        $this->id = $id;   
    }
    /**
     * Run the validation rule.
     *
     *Ensures that the project name is unique within a specified trimester and year. 
     *The optional id parameter allows excluding a specific project from the validation, which is useful when updating a project's details
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->id == null){
            $projects = Project::where('trimestre',$this->trimestre)->where('year', $this->year)->get();
        }else{
            $projects = Project::whereNotIn('id', [$this->id])->where('trimestre',$this->trimestre)->where('year', $this->year)->get();
        }
        foreach($projects as $project){
            $title = strtolower($project->title);
            if($title == strtolower($value)){
                $fail("The :attribute must be different");
            }
        }
    }
}
