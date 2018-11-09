@extends('admin.master')

@section('content')
<hr>
<br>
<br>
   <div class="container">
   	{!! Form::open(['method'=>'POST','url'=>'/dashbord/order-update','class'=>'form-horizontal'])!!}

     <div class="form-group">
    <label class="control-label col-sm-2" for="orderStatus">Order Status:</label>
    <div class="col-sm-6">
      <input type="text" value="{{$orderById->orderStatus}}" class="form-control" name="orderStatus">
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-2" for=""></label>
    <div class="col-sm-6">
      <input type="hidden" name="orderId" value="{{$orderById->id}}" class="form-control">
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-6">
      <button type="submit" class="btn btn-info btn-block">Update</button>
    </div>
  </div>

   	{!! Form::close()!!}

   </div>
   <hr>
@endsection