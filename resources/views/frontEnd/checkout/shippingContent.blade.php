@extends('frontEnd.master')

@section('mainContent')
<hr>
<div class="container">
	<div class="row">
		<div class="col-lg-14">
			<div class="well lead text-center text-success">Hi <b>{{$customerById->name}}</b> now give your shipping address here to complete the process And click the <b>save</b> button</div>
            <h3 class="text-center">Shipping Form</h3>
            <hr>
            {!! Form::open(['url'=>'/checkout/save-shipping','method'=>'POST','class'=>'form-horizontal']) !!}

                <div class="form-group">
                    <label class="control-label col-lg-4" for="fullName">Full Name</label>
                    <div class="col-lg-5">
                        <input type="text" value="{{$customerById->name}}" name="fullName"  class="form-control">
                    </div>
                </div>
    
                <div class="form-group">
                    <label class="control-label col-lg-4" for="email">Email</label>
                    <div class="col-lg-5">
                        <input type="text" value="{{$customerById->email}}" name="email"  class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-4" for="phoneNumber">Phone Number</label>
                    <div class="col-lg-5">
                        <input type="text" value="{{$customerById->phone}}" name="phoneNumber"  class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-4" for="address">Address</label>
                    <div class="col-lg-5">
                        <textarea class="form-control" name="address"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-5  col-lg-offset-4" style="text-align: center;">
                        <input type="submit" name="submit" value="Save" class="btn btn-success btn-lg">
                    </div>
                    <div>

                    </div>

                </div>
            {!! Form::close()!!}

		</div>
	</div>
</div>
@endsection