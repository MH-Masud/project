@extends('frontEnd.master')

@section('mainContent')
<hr>
<div class="well lead text-center text-success">If You Don't Have An Account Then Register First</div>
<h3 class="text-center">Registation Form</h3>
<hr>
{!! Form::open(['url'=>'/checkout/sign-up','method'=>'POST','class'=>'form-horizontal']) !!}

                <div class="form-group">
                    <label class="control-label col-lg-4" for="firstName">Full Name</label>
                    <div class="col-lg-4">
                        <input type="text" name="name"  class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-lg-4" for="email">Email</label>
                    <div class="col-lg-4">
                        <input type="text" name="email"  class="form-control" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-4" for="password">Password</label>
                    <div class="col-lg-4">
                        <input type="password" name="password"  class="form-control" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-4" for="phoneNumber">Phone Number</label>
                    <div class="col-lg-4">
                        <input type="text" name="phone"  class="form-control" required="">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-5  col-lg-offset-4" style="text-align: center;">
                        <input type="submit" name="submit" value="Register " class="btn btn-success btn-lg">
                        <span>Already Registered?</span>
                        <a href="{{url('/checkout')}}"> Sign Up</a>
                    </div>
                    <div>

                    </div>

                </div>
            {!! Form::close()!!}          

@endsection