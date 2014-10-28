<?php
/**
 * Created by PhpStorm.
 * User: emirsoftic
 * Date: 27.10.14.
 * Time: 22:33
 */

namespace sportBooking\Repositories\User;


class UserRepository {

    public function getAllUsers() {

        $users = \User::all();
        return $users;

    }

} 