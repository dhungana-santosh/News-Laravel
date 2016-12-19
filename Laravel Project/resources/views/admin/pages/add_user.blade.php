@extends('layouts.master')

@section('title')
    ADD USER
@endsection

@section('content')
    <div class="content">
        <h1><i class="fa fa-plus"></i> ADD USER</h1>
        <hr>

        @include('admin.common.message')
        <form action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="uname" value="{{old('uname')}}" class="form-control">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="{{old('email')}}" class="form-control">
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
                <label>Upload Image</label>
                <input type="file" name="image" value="{{old('image')}}" class="form-control">
            </div>

            <div class="form-group">
                <label>Authentication Type</label>
                <select name="auth_type" id="" class="form-control">
                    <option value="" selected>-- Select Authentication Type --</option>
                    <option {{(old('auth_type')=='user'?'selected':'')}}  value="user">User</option>
                    <option {{(old('auth_type')=='admin'?'selected':'')}} value="admin">Administrator</option>
                </select>

            </div>

            <div class="form-group">
                <input type="submit" value="Register User" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection