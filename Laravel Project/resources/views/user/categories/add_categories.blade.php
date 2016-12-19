@extends('layouts.master')
@section('title')
    Add Categories
@endsection

@section('content')
    <div class="content">
        <h1><i class="fa fa-plus"></i> ADD CATEGORIES</h1>
        <hr>
        @include('admin.common.message')
        <form action="" method="post" >
            {{csrf_field()}}
            <div class="form-group">
                <label>Add Categories</label>
                <input type="text" name="catname" value="{{old('catname')}}" class="form-control">
            </div>

            <div class="form-group">

                <input type="submit" value="Add Categories" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection