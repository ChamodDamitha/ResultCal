<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="{!! asset('CSS/bootstrap.min.css') !!}" type="text/css">
        <script src="{{asset('JS/bootstrap.min.js')}}"></script>
        <style>
            .wrapperTrans
            {
                margin-top:100px;
                border: 2px solid;
                border-radius: 25px;
                border-color:white ;
                background:rgba(0,0,0,0.4);
                }
                body
                {
                    color: white;
                }
        </style>
    </head>

    <body background="{{asset('Images/loginBack3.jpg')}}" >
        <div id="pageHeader">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <img src="{!! asset('Images/logo.png') !!}" style="width:50px;height:50px">
                        <a class="navbar-brand" href="#">Result Cal</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="/LogStudent">Log In</a></li>
                            <li><a href="/AddStudent">Sign Up</a></li>
                            <li><a href="/LogOutStudent">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        @if(Session::has('flash_message'))
            <div class="alert alert-success container">
                {{session('flash_message')}}
            </div>
        @endif
        @if(count($errors)>0 || Session::has('login_error'))
            <div class="container alert alert-danger" id="status" >
                <div class="col-md-6">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        @if(Session::has('login_error'))
                            <li>{{session('login_error')}}</li>
                        @endif
                    </ul>
                </div>
            </div>
        @endif

        @yield('main_content')

        <script>
            $('div.alert-success').delay(3000).slideUp(300);
        </script>
    </body>
</html>

