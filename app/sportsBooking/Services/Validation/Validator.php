<?php
/**
 * Created by PhpStorm.
 * User: emirsoftic
 * Date: 04.12.14.
 * Time: 20:07
 */

namespace sportsBooking\Services;


class Validator extends AbstractValidator {


    protected $userCreateRules          = array(
        'email'                         => 'required|email|unique:users',
        'password'                      => 'required|min:8|confirmed',
    );


} 