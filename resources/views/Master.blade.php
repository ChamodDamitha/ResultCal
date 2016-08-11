<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="{!! asset('CSS/bootstrap.min.css') !!}" type="text/css">
    </head>

    <body>
        <div id="pageHeader">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        //<img src="{!! asset('Images/logo.png') !!}" style="width:50px;height:50px">
                        <a class="navbar-brand" href="#">Result Cal</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Log In</a></li>
                            <li><a href="#">New Account</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        @yield('main_content')
    </body>

</html>

