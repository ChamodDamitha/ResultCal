@extends('Master')

@section('main_content')
    <div style="margin-left: 400px ">
        <h1>Want To See Your Results...!</h1>
    </div>
    <div style="width: 20%; text-align: center" class="container wrapperTrans">
        <form id="loginForm" name="loginForm" action="/LogStudent" method="post" style="margin-top: 40px">
            <div class="form-group">
                <input class="form-control" type="text" name="indexno" placeholder="Index No" style="text-align: center" value="{{Request::old('indexno')}}">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password"  style="text-align: center"  value="{{Request::old('password')}}">
            </div>
            </br>
            <div>
                <button class="btn btn-primary form-control" id="btnLogin" >Log In</button></br></br>
            </div>
            <div>
                <a href="/AddStudent">Create New Account</a>
            </div>
            </br></br>

            <input type="hidden" name="_token" value="{{Session::token()}}">

        </form>
    </div>
@stop