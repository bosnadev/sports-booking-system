<?php

use sportsBooking\Repositories\User\UserRepository;
use sportsBooking\Services\Validator;

class UserController extends \BaseController {

    protected $user;

    protected $validator;

    public function __construct(UserRepository $user, Validator $validator) {
        $this->user         = $user;
        $this->validator    = $validator;
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
        return View::make('users.index' , compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
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
        else
        {
            return Redirect::back()->withInput()->withErrors($v->errors());
        }
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
		//
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
		//
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
		//
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
		//
	}

}