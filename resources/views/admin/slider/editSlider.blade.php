@extends('admin.master')

@section('content')
<hr>
<h3 class="text-center">{{Session::get('message')}}</h3>
<hr>
  <div class="container">
    <div class="row">
        {!! Form::open(['url'=>'/slider/update','method'=>'POST','class'=>'form-horizontal','name'=>'editSliderForm','enctype'=>'multipart/form-data']) !!}

                <div class="form-group">
                    <label class="control-label col-lg-2" for="sliderImage">Slider Image</label>
                    <div class="col-lg-8">
                        <input type="file" name="sliderImage" accept="/image/*">
                        <span class="text-danger">{{$errors->has('sliderImage') ? $errors->first('sliderImage') : ''}}</span>
                        <input type="hidden" name="sliderId" value="{{$sliderById->id}}" class="form-control">
                    </div>

                    <div class="col-lg-8">
                        <img src="{{asset($sliderById->sliderImage)}}" height="200" width="200">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Publication Status</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="publicationStatus">
                            <option>Select Publication Status</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>

                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-8  col-lg-offset-2">
                        <input type="submit" name="submit" value="Save Slider Image" class="btn btn-success btn-block">
                    </div>
                </div>
            {!! Form::close()!!}
    </div>
</div>
<script>
    document.forms['editSliderForm'].elements['publicationStatus'].value = {{$sliderById->publicationStatus}}
</script>
@endsection