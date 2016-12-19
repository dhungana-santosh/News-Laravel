
@section('title')
    Login Page
@endsection

@include('admin.common.head')
@include('admin.common.foot')

@yield('head')

<div class="container " >
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default" style="margin-top: 100px">
            <div class="panel-heading">
                <h3 class="panel-title">Log In </h3>
            </div>

            <div class="panel-body">
                @include('admin.common.message')
                <form action="{{route('login')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="something@anything.com" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="**************" class="form-control">
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
                        <label for="remember"> <input type="checkbox" name="remember" id="remember"> Remember Me</label>
                        <input type="submit" name="login" class="btn btn-success pull-right">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@yield('foot')