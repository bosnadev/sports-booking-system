@extends('layout.main')

@section('content')

<h1>Create new user</h1>

{{ Form::open(array( 'route'    => 'users.store'    , 'method'  => 'POST' )) }}

<div class="form-group">
    {{ Form::label('first_name') }}
    {{ Form::text('first_name' , null , array('class' => 'form-control') ) }}
    <div class="validation_error">
        {{ $errors->first('first_name') }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('last_name') }}
    {{ Form::text('last_name' , null , array('class' => 'form-control' ) ) }}
    <div class="validation_error">
        {{ $errors->first('last_name') }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('email') }}
    {{ Form::email('email' , null , array( 'class' => 'form-control' ) ) }}
    <div class="validation_error">
        {{ $errors->first('email') }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('password') }}
    {{ Form::password('password' , array( 'class' => 'form-control' ) ) }}
    <div class="validation_error">
        {{ $errors->first('password') }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('confirm password') }}
    {{ Form::password('password_confirmation' , array( 'class' => 'form-control' )) }}
</div>

<div class="form-group">
{{ Form::submit('save') }}
</div>

{{ Form::close() }}

@stop