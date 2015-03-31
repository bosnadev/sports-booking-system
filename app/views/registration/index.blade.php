<h1>Register</h1>

{{ Form::open([ 'route' => 'registration.store' , 'method'  => 'POST' ]) }}

    <div class="validation_error">
        {{ $errors->first('error') }}
    </div>

    <div class="form-group">
        {{ Form::label('Email')  }}
        {{ Form::email('email' , null , [ 'class'   => 'form-control']) }}
        <div class="validation_error">
            {{ $errors->first('email') }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('Password') }}
        {{ Form::password('password' , [ 'class'    => 'form-control' ]) }}
        <div class="validation_error">
            {{ $errors->first('password') }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('Password confirmation') }}
        {{ Form::password('password_confirmation' , [ 'class'   =>  'form-control' ]) }}
        <div class="validation_error">
            {{ $errors->first('confirmation') }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::submit('Register' , [ 'class'  =>  'btn btn-primary' ]) }}
    </div>

{{ Form::close() }}