<?php

namespace sportsBooking\Repositories\User;

use Input;
use Sentry;
use Redirect;


class RegistrationRepository {

    protected $activate = true;

    public function save() {
        $credentials = [
            'email'         => Input::get('email'),
            'password'      =>  Input::get('password')
        ];
        $user = Sentry::register($credentials , $this->activate);
        $this->activationCode($user);
    }

    private function activationCode($user)
    {
        $activationCode = $user->getActivationCode();
    }

} 