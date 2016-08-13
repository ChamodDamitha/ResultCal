@extends('Master')

@section('main_content')
    @if(count($errors)>0 || Session::has('login_error'))
        <div class="container alert alert-danger" id="status">
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
    <div style="text-align:center;margin-top:100px;">
        <form id="loginForm" name="loginForm" action="/LogStudent" method="post">
            <div class="form-group">
                <input type="text" name="indexno" placeholder="Index No" onfocus="clearStatus()" style="text-align: center" value="{{Request::old('indexno')}}">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" onfocus="clearStatus()" style="text-align: center"  value="{{Request::old('password')}}">
            </div>
            </br>
            <div>
                <button class="btn btn-primary" id="btnLogin" >Log In</button></br></br>
            </div>
            <div>
                <a href="/AddStudent">Create New Account</a>
            </div>
            </br></br>

            <input type="hidden" name="_token" value="{{Session::token()}}">

        </form>
    </div>
@stop