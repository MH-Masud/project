@extends('admin.master')

@section('content')
<hr>
<h3 class="text-center">{{Session::get('message')}}</h3>
<hr>
<div class="container">

	<div class="row">
		
			{!! Form::open(['url'=>'/manufacture/save','method'=>'POST','class'=>'form-horizontal']) !!}

                 <div class="form-group">
                 	{{ Form::label('manufactureName','Manufacture Name',['class'=>'control-label col-lg-2'])}}
                 <div class="col-lg-8">
                 	{{ Form::text('manufactureName',null,['class'=>'form-control'])}}
                    <span class="text-danger">{{$errors->has('manufactureName') ? $errors->first('manufactureName'):''}}</span>
                 </div>
                 </div>

                 <div class="form-group">
                 	{{ Form::label('manufactureDescription','Manufacture Description',['class'=>'control-label col-lg-2'])}}
                 	<div class="col-lg-8">
                 		{{ Form::textarea('manufactureDescription',null,['class'=>'form-control'])}}
                        <span class="text-danger">{{$errors->has('manufactureDescription') ? $errors->first('manufactureDescription'):''}}</span>
                 	</div>
                 </div>

                 <div class="form-group">
                 	{{ Form::label('manufactureStatus','Manufacture Status',['class'=>'control-label col-lg-2'])}}
                 	<div class="col-lg-8">
                 		{{ Form::select('manufactureStatus',['1'=>'Published','0'=>'Unpublished'],null,['placeholder'=>'Select','class'=>'form-control'])}}
                 	</div>
                 </div>

                 <div class="form-group">
                 	<div class="col-lg-offset-2 col-lg-8">
                 		{{ Form::submit('Save Manufacture Info',['class'=>'btn btn-success btn-block','name'=>'btn'])}}
                 	</div>
                 </div>
			{!! Form::close()!!}
		
	</div>
</div>
@endsection