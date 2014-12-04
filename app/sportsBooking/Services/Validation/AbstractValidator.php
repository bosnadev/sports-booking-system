<?php
/**
 * Created by PhpStorm.
 * User: emirsoftic
 * Date: 04.12.14.
 * Time: 19:56
 */

namespace sportsBooking\Services;
use Validator;

abstract class AbstractValidator {

    protected $rules;

    protected $errors;

    protected $inputs;

    public function with(array $inputs)
    {
        $this->inputs = $inputs;
        return $this;
    }

    public function passes()
    {
        $validator = Validator::make($this->inputs, $this->rules );
        if ($validator->fails())
        {
            $this->errors = $validator->messages();
            return false;
        }
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function useRules($rules)
    {
        $this->rules = $this->{$rules} ;
        return $this;
    }

} 