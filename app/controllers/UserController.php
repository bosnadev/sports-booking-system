<?php

use sportsBooking\Repositories\User\UserRepository;
use sportsBooking\Services\Validator;

class UserController extends \BaseController {

    protected $user;

    protected $validator;

    protected $theme;

    public function __construct(UserRepository $user, Validator $validator) {
        $this->user         = $user;
        $this->validator    = $validator;
        $this->theme        = \Theme::uses('default');
    }


	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->getAllUsers();
        return $this->theme->of('users.index' , [ 'users'   => $users ])->render();

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->of('users.create')->render();
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
	{
        $v = $this->validator->with(Input::all())->useRules('userCreateRules');
		if ($v->passes())
        {
            $this->user->store(Input::all());
            return Redirect::route('users.index')->with('success' , trans('users.user_saved'));
        }
        return Redirect::back()->withInput()->withErrors($v->errors());

	}

	/**
	 * Display the specified resource.
	 * GET /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->user->find($id);
        return $this->theme->of('users.show' , [ 'user' => $user])->render();
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->user->find($id);
        return $this->theme->of('users.edit' , [ 'user' => $user ])->render();
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$v = $this->validator->with(Input::all())->useRules('userEditRules');
        if ($v->passes())
        {
            $this->user->update($id);
            return Redirect::route('users.index')->with('success' , trans('users.user_updated'));
        }
        return Redirect::back()->withInput()->withErrors($v->errors());

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->user->delete($id);
        return Redirect::back()->with('success' , trans('users.user_deleted'));
	}

    /**
     * @param $id
     * @return mixed
     */

    public function updatePassword($id)
    {
        $v = $this->validator->with(Input::all())->useRules('updatePassword');
        if ($v->passes())
        {
            $this->user->updatePassword($id);
            return Redirect::route('users.index')->with('success' , trans('users.user_password_updated'));
        }
        return Redirect::back()->withErrors($v->errors());
    }

}