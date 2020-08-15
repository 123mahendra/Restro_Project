@extends('layout')

@section('content')
<div>
    <div class="col-md-6">
    <h1>User Register Page</h1>
    <form method="post" action="register"> 
    @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email Name">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
        </div>
        <div class="form-group">
            <label>Contact No.</label>
            <input type="text" name="contact" class="form-control" placeholder="Enter Number">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
<div>
@endsection