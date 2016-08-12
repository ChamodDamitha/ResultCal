@extends('Master')

@section('main_content')
    @if(count($errors)>0)
        <div class="container alert alert-danger" id="status">
            <div class="col-md-6 col-md-offset-1">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div id="pageMiddle" class="container">
        <h3>Create Account</h3>
        <form name="createAccountForm" id="createAccountForm" method="post"  action="/AddStudent">
            <div class="form-group {{$errors->has('name')? 'has-error':''}}" >
                <label>Name : </label>
                <input class="form-control" name="name" type="text" onfocus="emptyElement('status')" value="{{Request::old('name')}}">
            </div>
            <div class="form-group {{$errors->has('indexno')? 'has-error':''}}">
                <label>Index No : </label>
                <input class="form-control" name="indexno" type="text" maxlength="6" value="{{Request::old('indexno')}}" onfocus="emptyElement('indexNoStatus')">
            </div>
            <div class="form-group {{$errors->has('password')? 'has-error':''}}">
                <label>Password : </label>
                <input class="form-control" name="password" type="password" maxlength="20" value="{{Request::old('password')}}" onfocus="emptyElement('status')">
            </div>
            <div class="form-group {{$errors->has('password_confirmation')? 'has-error':''}}">
                <label>Cofirm Password : </label>
                <input class="form-control" name="password_confirmation" type="password" maxlength="20" value="{{Request::old('password_confirmation')}}" onfocus="emptyElement('status')">
            </div>
            </br>
            <button class="btn btn-primary" id="createAccountBtn" >Create Account</button></br></br>

            <input type="hidden" name="_token" value="{{Session::token()}}">

        </form>
    </div>

@stop
