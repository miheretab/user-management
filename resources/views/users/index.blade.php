@extends('layouts.app')

@section('template_title')
  Users
@endsection

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        Showing All Users

                        <div class="pull-right">
                            <a href="/users/create" class="btn btn-sm btn-secondary">
                                <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                Create New User
                            </a>
                        </div>
                    </div>
                </div>

                <div class="panel-body">

                    <div class="users-table">
                        <table class="table table-striped table-condensed data-table">
                            <thead>
                                <tr>
                                    <th>{{trans('forms.label_first_name')}}</th>
                                    <th>{{trans('forms.label_surname')}}</th>
                                    <th>{{trans('forms.label_sidn')}}</th>
                                    <th>{{trans('forms.label_mobile_number')}}</th>
                                    <th>{{trans('forms.label_email')}}</th>
                                    <th>{{trans('forms.label_birth_date')}}</th>
                                    <th>{{trans('forms.label_language')}}</th>
                                    <th>{{trans('forms.label_interests')}}</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->first_name}}</td>
                                        <td>{{$user->surname}}</td>
                                        <td>{{$user->south_african_id_number}}</td>
                                        <td>{{$user->mobile_number}}</td>
                                        <td><a href="mailto:{{ $user->email }}" title="email {{ $user->email }}">{{ $user->email }}</a></td>
                                        <td>{{$user->birth_date}}</td>
                                        <td>{{$user->language ? $user->language->name : ''}}</td>
                                        <td>@foreach($user->interests as $interest) <span class="badge badge-secondary">{{$interest->name}}</span> @endforeach </td>
                                        <td>
                                            {!! Form::open(array('url' => 'users/delete/' . $user->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                {!! Form::hidden('_method', 'DELETE') !!}
                                                {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> Delete User', array('class' => 'btn btn-danger btn-sm','type' => 'submit', 'style' =>'width: 100%;', 'onclick' => "return confirm('Are you sure you want to delete this user ?');")) !!}
                                            {!! Form::close() !!}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('users/edit/' . $user->id) }}" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Edit User
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
