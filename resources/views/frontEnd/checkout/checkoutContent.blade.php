@extends('frontEnd.master')

@section('mainContent')
<div class="well lead text-center text-success">You Have To Login To Continue The Process</div>
 <h3 class="text-center text-danger">{{Session::get('message')}}</h3>
<hr>
<h3 class="text-center">Login Form</h3>
<hr>
            {!! Form::open(['url'=>'/user-login','method'=>'POST','class'=>'form-horizontal']) !!}
 
                <div class="form-group">
                    <label class="control-label col-lg-5" for="email">Email</label>
                    <div class="col-lg-3">
                        <input type="text" name="email"  class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-5" for="password">Password</label>
                    <div class="col-lg-3">
                        <input type="text" name="password"  class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-3  col-lg-offset-6">
                        <input type="submit" name="submit" value="Login" class="btn btn-success btn-lg">

                        <span>Not Registered?</span>
                    	<a href="{{url('/checkout/register')}}">Creat an account</a>
                    </div>
                    <div>

                    </div>

                </div>
            {!! Form::close()!!}
<div>
   
</div>
<hr>
@endsection