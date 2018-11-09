@extends('admin.master')

@section('content')
<hr>
<hr>
<div class="container">
	<div class="row">
		<div class="col-lg-11">
			<h3 class="text-center">Order Details Info</h3>
	        <div class="table-responsive">
	        	<table class="table table-bordered">
    <thead>
      <tr>
      	<th>Customer ID</th>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Quantity</th>

        <th>Total Cost</th>
        
      </tr>
    </thead>
    <tbody>
      <tr class="info">
      	<td>{{$order_DetailsByOrderBy->customerId}}</td>
        <td>{{$order_DetailsByOrderBy->productId}}</td>
        <td>{{$order_DetailsByOrderBy->productName}}</td>
        <td>{{$order_DetailsByOrderBy->productPrice}}</td>
        <td>{{$order_DetailsByOrderBy->productQuantity}}</td>
        <td>{{$order_DetailsByOrderBy->orderTotal}}</td>
        
      </tr>
    </tbody>
  </table>
	        </div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-11 table-responsive">
			<h3 class="text-center">Customer Info</h3>
		<table class="table table-bordered">
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
      </tr>
    </thead>
    <tbody>
      <tr class="info">
        <td>{{$shippingDetailsByOrderId->name}}</td>
        <td>{{$shippingDetailsByOrderId->email}}</td>
        <td>{{$shippingDetailsByOrderId->phone}}</td>
      </tr>
    </tbody>
  </table>
	</div>
	</div>
	<br>
	
	<div class="row">

		<div class="col-lg-11 table-responsive">
			<h3 class="text-center">Shipping Info</h3>	
			<table class="table table-bordered table-">
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
      <tr class="info">
        <td>{{$shippingDetailsByOrderId->fullName}}</td>
        <td>{{$shippingDetailsByOrderId->email}}</td>
        <td>{{$shippingDetailsByOrderId->phoneNumber}}</td>
        <td>{{$shippingDetailsByOrderId->address}}</td>
      </tr>
    </tbody>
  </table>
		</div>
		
	</div>
</div>
<hr>
@endsection