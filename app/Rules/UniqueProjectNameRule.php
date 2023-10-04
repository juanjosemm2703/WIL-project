<?php

namespace App\Rules;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueProjectNameRule implements ValidationRule
{
    protected $trimestre;
    protected $year;

    public function __construct($trimestre, $year)
    {
        $this->trimestre = $trimestre;
        $this->year = $year;   
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $projects = Project::where('trimestre',$this->trimestre)->where('year', $this->year)->get();
        foreach($projects as $project){
            $title = strtolower($project->title);
            if($title == strtolower($value)){
                $fail("The :attribute must be different");
            }
        }
    }
}
