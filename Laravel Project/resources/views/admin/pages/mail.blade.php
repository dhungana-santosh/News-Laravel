
@extends('layouts.master')

@section('title')
Send Mail
@endsection

@section('content')
<div class="content">
    <h1>Send Email</h1>
    <hr>
    @include('admin.common.message')

    <form action="{{route('send-mail')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label>Email Id</label>
            <input type="text" class="form-control" name="mail_to">
        </div>

        <div class="form-group">
            <label>Subject</label>
            <input type="text" class="form-control" name="subject">
        </div>

        <div class="form-group">
            <label>Mail</label>
            <textarea name="mail" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Send Email</button>
        </div>
    </form>

</div>
@endsection