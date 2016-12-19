@extends('layouts.master')

@section('title')
    Update
@endsection

@section('content')
    <div class="content">
        <h1><i class="fa fa-edit"></i> ADD USER</h1>
        <hr>

        @include('admin.common.message')
        <form action="{{route('update-submit')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$user->id}}">

            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="uname" value="{{$user->uname}}" class="form-control">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="{{$user->email}}" class="form-control">
            </div>

            <div class="form-group">
                <label>Old Password</label>
                <input type="password" name="oldpassword" value="" class="form-control">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="" class="form-control">
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" value="" class="form-control">
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-10">
                        <label>Upload Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="updateimage">
                        <div class="col-xs-2">
                            <img height="40" src="{{URL::to('uploads/users/'.$user->image)}}" alt="{{$user->image}}">

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Register User" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection