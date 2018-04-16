@extends('layouts.app')

@section('template_title')
  Edit User
@endsection

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">

            <strong>Edit User</strong>

          </div>

          {!! Form::model($user, array('action' => array('UsersController@update', $user->id), 'method' => 'PUT', 'data-parsley-validate')) !!}

            {!! csrf_field() !!}

            <div class="panel-body">

                @include('users.form')

            </div>

          {!! Form::close() !!}

        </div>
      </div>
    </div>
  </div>

@endsection
