@extends('layouts.master')

@section('title')
    Users
@endsection

@section('content')
    <div class="content">
        <h1><i class="fa fa-user"></i> Users</h1>
        <hr>
        @include('admin.common.message')
        <table class="table table-responsive table-bordered">
            <thead>
            <th width="5%">S.no</th>
            <th>Email</th>
            <th width="7%">Role</th>
            <th width="7%">Image</th>
            <th width="21%">Action</th>
            <tbody>
            @foreach($users as $key=>$user)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->auth_type}}</td>
                    <td><img height="40" src="{{URL::to('uploads/users/'.$user->image)}}" alt="{{$user->image}}"></td>
                    <td>
                        <a href="{{route('delete-user',[$user->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash "></i> Delete</a>
                        <a href="{{route('update-user',[$user->id])}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Update</a>
                        @if($user->user_status=='enabled')
                            <a href="" class="btn btn-default btn-xs btn-user-status" data-id="{{$user->id}}">Disable</a>
                        @else
                            <a href="" class="btn btn-default btn-xs btn-user-status" data-id="{{$user->id}}">Enable</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection