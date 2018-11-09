@extends('admin.master')

@section('content')
<hr>
<h3 class="text-center">{{Session::get('message')}}</h3>
<hr>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-center">Orders</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<div class="container">
    <div class="row">
        <div class="col-lg-11">
            <table class="table table-bordered ">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Payment Type</th>
        <th>Order Total</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Order Status</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
         @foreach($allOrders as $Order)
      <tr class="info">
        <td>{{$Order->id}}</td>
        <td>{{$Order->paymentType}}</td>
        <td>{{$Order->orderTotal}}</td>
        <td>{{$Order->created_at}}</td>
        <td>{{$Order->updated_at}}</td>
        <td>{{$Order->orderStatus}}</td>
        <td>
            <a href="{{url('/dashbord/order-details/'.$Order->id)}}" class="btn btn-success">
               <span class="glyphicon glyphicon-info-sign" title="view order"></span>
            </a>
            <a href="{{url('/dashbord/order-edit/'.$Order->id)}}" class="btn btn-success">
               <span class="glyphicon glyphicon-edit" title="edit order"></span>
            </a>
             <a href="" class="btn btn-danger" onclick="return confirm('are you sure to delete this');">
                <span class="glyphicon glyphicon-trash" title="delete order"></span>
            </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
        </div>
    </div>
    <div>
        {{$allOrders->links()}}
    </div>
</div>
            <!-- /.row -->
@endsection