<?php

use sportsBooking\Services\Validator;
use sportsBooking\Repositories\User\RegistrationRepository as Registration;

class RegistrationController extends \BaseController {

    protected $theme;

    protected $validator;

    protected $registration;

    public function __construct(Validator $validator , Registration $registration) {
            $this->theme        = \Theme::uses('default');
            $this->validator    =   $validator;
            $this->registration     = $registration;

    }

    public function index()
    {
        return $this->theme->of('registration.index')->render();
    }

    public function store()
    {
        $v = $this->validator->with(Input::all())->useRules('registration');
        if($v->passes()) {
            return $this->registration->save();
        }
        return Redirect::back()->withInput()->withErrors($v->errors());
    }

} 