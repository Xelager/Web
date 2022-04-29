<?php

namespace app\models\validators;

class ResultsValidation extends TestValidator
{
    public $answers = [];
    public $ask = 0;
    public $correct = 0;

    public function SetAnswer($key, $value) {
        $this->answers[$key] = $value;
        $this->ask++;
    }

    public function checkAnswer($post) {
        foreach ($this->answers as $key => $value) {
            if ($this->answers[$key] == $post[$key]) {
                $this->correct++;
            }
        }
        return $this->correct;
    }

    function validate($post_array, $predicates = []) : bool
    {
        return parent::validate($post_array);
    }
}