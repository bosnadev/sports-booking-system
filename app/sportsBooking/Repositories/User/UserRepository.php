<?php
/**
 * Created by PhpStorm.
 * User: emirsoftic
 * Date: 27.10.14.
 * Time: 22:33
 */

namespace sportsBooking\Repositories\User;

use Input, User;


class UserRepository {

    public function getAllUsers() {

        $users = \User::all();
        return $users;

    }

    public function find($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function store()
    {
        $user                   =   new \User;
        $user->first_name       =   Input::get('first_name');
        $user->last_name        =   Input::get('last_name');
        $user->email            =   Input::get('email');
        $user->password         =   Input::get('password');
        $user->save();
    }

    public function update($id)
    {
        $user                   =   $this->find($id);
        $user->first_name       =   Input::get('first_name');
        $user->last_name        =   Input::get('last_name');
        $user->email            =   Input::get('email');
        $user->password         =   Input::get('password');
        $user->save();
    }

    public function updatePassword($id)
    {
        $user                   = $this->find($id);
        $user->password         = Input::get('password');
        $user->save();
    }

    public function delete($id)
    {
        $user                   = $this->find($id);
        $user->delete();
    }

} 