<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class WordCountRule implements ValidationRule
{
    protected $minWords;

    public function __construct($minWords)
    {
        $this->minWords = $minWords;
    }
    /**
     * Run the validation rule.
     *
     *Ensures that a given attribute's value has at least a specified minimum number of words. 
     *If the word count is below the minimum, a validation failure is reported with a custom error message.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $wordCount = str_word_count($value);
        
        if($wordCount<$this->minWords){
            $fail("The :attribute must have at least $this->minWords words");
        }

    }
}
