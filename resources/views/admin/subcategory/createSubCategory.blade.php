@extends('admin.master')

@section('content')
<hr>
<h3 class="text-center text-succss">{{Session::get('message')}}</h3>
<hr>
<div class="container">

	<div class="row">
		
             
			{!! Form::open(['url'=>'/sub-category/save','method'=>'POST','class'=>'form-horizontal']) !!}

                 <div class="form-group">
                 	{{ Form::label('subCategoryName','Sub Caegory Name',['class'=>'control-label col-lg-2'])}}
                 <div class="col-lg-8">
                 	{{ Form::text('subCategoryName',null,['class'=>'form-control'])}}
                    <span class="text-danger">{{$errors->has('subCategoryName') ? $errors->first('subCategoryName'):''}}</span>
                 </div>
                 </div>

                 <div class="form-group">
                    <label class="control-label col-lg-2" for="categoryId">Category Name</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="categoryId">
                            <option>Select Category Name</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->categoryName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2" for="manufactureId">Manufacture Name</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="manufactureId">
                            <option>Select Manufacture Name</option>

                            @foreach($manufactures as $manufacture)
                            <option value="{{$manufacture->id}}">{{$manufacture->manufactureName}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                 <div class="form-group">
                 	{{ Form::label('subCategoryDescription','Sub Category Description',['class'=>'control-label col-lg-2'])}}
                 	<div class="col-lg-8">
                 		{{ Form::textarea('subCategoryDescription',null,['class'=>'form-control'])}}
                        <span class="text-danger">{{$errors->has('subCategoryDescription') ? $errors->first('subCategoryDescription'):''}}</span>
                 	</div>
                 </div>

                 <div class="form-group">
                 	{{ Form::label('subCategoryStatus',' Sub Category Status',['class'=>'control-label col-lg-2'])}}
                 	<div class="col-lg-8">
                 		{{ Form::select('subCategoryStatus',['1'=>'Published','0'=>'Unpublished'],null,['placeholder'=>'Select','class'=>'form-control'])}}
                 	</div>
                 </div>

                 <div class="form-group">
                 	<div class="col-lg-offset-2 col-lg-8">
                 		{{ Form::submit('Save Sub Category Info',['class'=>'btn btn-success btn-block','name'=>'btn'])}}
                 	</div>
                 </div>
			{!! Form::close()!!}
		
	</div>
</div>
<hr>
@endsection