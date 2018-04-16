@extends('layouts.app')

@section('template_title')
  Create User
@endsection

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">

            <strong>Create User</strong>

          </div>

          {!! Form::open(array('action' => array('UsersController@store'), 'method' => 'POST', 'data-parsley-validate')) !!}

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
