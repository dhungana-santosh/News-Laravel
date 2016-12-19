@section('nav')
    <div class="nav">
        <div class="nav-top">
            <img src="{{URL::to('uploads/users/'.Auth::user()->image)}}">
            <h4>{{Auth::user()->uname}}</h4>
            <p>{{Auth::user()->email}}</p>
        </div>

        <div class="navlinks">
            <div class="search-box">
                <form>
                    <input type="text" class="search" placeholder="Search">
                </form>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="{{route('dash')}}"><i class="glyphicon glyphicon-cloud"> </i> Dashboard</a></li>

                    @if(Auth::user()->auth_type=='admin')
                    <li class="drop-down"><a href=""><i class="glyphicon glyphicon-user"> </i>  Users</a>
                        <ul>
                            <li><a href="{{route('add_user')}}"><i class="fa fa-plus"></i> Add User</a></li>
                            <li><a href="{{route('users')}}"><i class="fa fa-user"></i> Users</a></li>
                        </ul>
                    </li>
                    @endif


                    <li class="drop-down"><a href=""><i class="glyphicon glyphicon-user"> </i>  Gallery</a>
                        <ul>
                            <li><a href="{{route('add_category')}}"><i class="fa fa-plus"></i> ADD Category</a></li>
                            <li><a href=""><i class="fa fa-user"></i>Upload Image</a></li>
                            <li><a href=""><i class="fa fa-user"></i>View Categories</a></li>
                        </ul>
                    </li>

                    <li class="drop-down"><a href=""><i class="glyphicon glyphicon-new-window"> </i>  News</a>
                        <ul>
                            <li><a href=""><i class="fa fa-plus"></i> Add News</a></li>
                            <li><a href=""><i class="fa fa-plus"></i> Add News Category</a></li>
                            <li><a href=""><i class="fa fa-newspaper-o"></i> News List</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('send-mail')}}"><i class="fa fa-send"> </i>  Send Mail</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-globe"> </i>  Visit Site</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-log-out"> </i>  Log Out</a></li>
                </ul>
            </div>
        </div>
    </div><!--end of navigation-->



@endsection