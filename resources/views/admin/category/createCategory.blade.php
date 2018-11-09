@extends('admin.master')

@section('content')
<hr>
<div class="container">

	<div class="row">
		
             <h3 class="text-center text-succss">{{Session::get('message')}}</h3>
			{!! Form::open(['url'=>'category/save','method'=>'POST','class'=>'form-horizontal']) !!}

                 <div class="form-group">
                 	{{ Form::label('categoryName','Caegory Name',['class'=>'control-label col-lg-2'])}}
                 <div class="col-lg-8">
                 	{{ Form::text('categoryName',null,['class'=>'form-control'])}}
                    <span class="text-danger">{{$errors->has('categoryName') ? $errors->first('categoryName'):''}}</span>
                 </div>
                 </div>

                 <div class="form-group">
                 	{{ Form::label('categoryDescription','Category Description',['class'=>'control-label col-lg-2'])}}
                 	<div class="col-lg-8">
                 		{{ Form::textarea('categoryDescription',null,['class'=>'form-control'])}}
                        <span class="text-danger">{{$errors->has('categoryDescription') ? $errors->first('categoryDescription'):''}}</span>
                 	</div>
                 </div>

                 <div class="form-group">
                 	{{ Form::label('categoryStatus','Category Status',['class'=>'control-label col-lg-2'])}}
                 	<div class="col-lg-8">
                 		{{ Form::select('categoryStatus',['1'=>'Published','0'=>'Unpublished'],null,['placeholder'=>'Select','class'=>'form-control'])}}
                 	</div>
                 </div>

                 <div class="form-group">
                 	<div class="col-lg-offset-2 col-lg-8">
                 		{{ Form::submit('Save Category Info',['class'=>'btn btn-success btn-block','name'=>'btn'])}}
                 	</div>
                 </div>
			{!! Form::close()!!}
		
	</div>
</div>
@endsection