@extends('employee.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Reset your password</h2>
        </div>
        <div class="pull-right">
           
        </div>
    </div>
</div>
<!-- error messages  -->
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problem with your password.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 

<!--<form  action=""  method="post" > -->
<form action="{{url('resetpassword')}}" method="post">
@csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Current Password:</strong>
                <input type="text" class="form-control"  name="curpass" required>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>New Password:</strong>
                <input type="text" class="form-control"  name="newpass" required >
            </div>
        </div>

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Conform new Password:</strong>
                <input type="text" class="form-control"  name="conpass" required>
            </div>
        </div>
       
    <br><br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
               <input type="submit" class="btn btn-primary" value="change">
        </div>
</form>
@endsection