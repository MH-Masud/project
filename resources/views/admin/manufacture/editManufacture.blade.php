@extends('admin.master')

@section('content')
<hr>
<hr>
<div class="container">
    <div class="row">
        {!! Form::open(['url'=>'/manufacture/update','method'=>'POST','class'=>'form-horizontal','name'=>'editManufactureForm']) !!}

                <div class="form-group">
                    <label class="control-label col-lg-2" for="manufactureName">Manufacture Name</label>
                    <div class="col-lg-8">
                        <input type="text" name="manufactureName" value="{{$manufacture->manufactureName}}" class="form-control">
                        <input type="hidden" name="id" value="{{$manufacture->id}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="manufactureDescription">Manufacture Description</label>
                    <div class="col-lg-8">
                        <textarea class="form-control" name="manufactureDescription">{{$manufacture->manufactureDescription}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="manufactureStatus">Manufacture Status</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="manufactureStatus">
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
<script type="text/javascript">
    document.forms['editManufactureForm'].elements['manufactureStatus'].value={{$manufacture->manufactureStatus}}
</script>
@endsection