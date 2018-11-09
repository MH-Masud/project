@extends('admin.master')

@section('content')
<hr>
<div class="container">
	<div class="row">
        
			{{-- {!! Form::open(['url'=>'category/save','method'=>'POST','class'=>'form-horizontal']) !!}

                 <div class="form-group">
                 	{{ Form::label('categoryName','Caegory Name',['class'=>'control-label col-lg-2'])}}
                 <div class="col-lg-8">
                 	{{ Form::text('categoryName',null,['class'=>'form-control'])}}
                 </div>
                 </div>

                 <div class="form-group">
                 	{{ Form::label('categoryDescription','Category Description',['class'=>'control-label col-lg-2'])}}
                 	<div class="col-lg-8">
                 		{{ Form::textarea('categoryDescription',null,['class'=>'form-control'])}}
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
			{!! Form::close()!!} --}}

            {!! Form::open(['url'=>'/category/update','method'=>'POST','class'=>'form-horizontal','name'=>'editCategoryForm']) !!}

                <div class="form-group">
                    <label class="control-label col-lg-2" for="categoryName">Category Name</label>
                    <div class="col-lg-8">
                        <input type="text" name="categoryName" value="{{$categoryById->categoryName}}" class="form-control">
                        <input type="hidden" name="id" value="{{$categoryById->id}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="categoryDescription">Category Description</label>
                    <div class="col-lg-8">
                        <textarea class="form-control" name="categoryDescription">{{$categoryById->categoryDescription}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" >Category Status</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="categoryStatus">
                            <option>Select</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-8  col-lg-offset-2">
                        <input type="submit" name="submit" value="Update" class="btn btn-success btn-block">
                    </div>
                </div>
            {!! Form::close()!!}
		
	</div>
</div>
<script>
  document.forms['editCategoryForm'].elements['categoryStatus'].value = {{$categoryById->categoryStatus}}
</script>

@endsection