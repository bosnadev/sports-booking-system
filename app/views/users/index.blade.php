@extends('layout.main')

@section('content')

<table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th> Actions </th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td> {{ $user->first_name }}</td>
            <td> {{ $user->last_name }}</td>
            <td> {{ $user->email }}</td>
            <td> {{ link_to_route('users.edit' , 'Edit' , $user->id) }} </td>
        </tr>
        @endforeach
      </tbody>
    </table>


@stop