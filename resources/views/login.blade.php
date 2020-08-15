@extends('layout')

@section('content')
<div>
    <div class="col-md-6">
    <h1>User Login</h1>
    <form method="post" action="login"> 
    @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email Name">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
<div>
@endsection