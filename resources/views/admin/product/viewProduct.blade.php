@extends('admin.master')

@section('content')
<hr>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-bordered table-hover">
    <tr>
      <th>Id</th>
      <th>{{$productInfoById->id}}</th>
    </tr>
    <tr>
      <th>Product Name</th>
      <th>{{$productInfoById->productName}}</th>
    </tr>
    <tr>
      <th>Category Name</th>
      <th>{{$productInfoById->categoryName}}</th>
    </tr>
    <tr>
      <th>Manufacture Name</th>
      <th>{{$productInfoById->manufactureName}}</th>
    </tr>
    <tr>
      <th>Product Price</th>
      <th>{{$productInfoById->productPrice}}</th>
    </tr>
    <tr>
      <th>Product Quantity</th>
      <th>{{$productInfoById->productQuantity}}</th>
    </tr>
    <tr>
      <th>Product Short Description</th>
      <th>{!! $productInfoById->productShortDescription !!}</th>
    </tr>
    <tr>
      <th>Product Long Description</th>
      <th>{!! $productInfoById->productLongDescription !!}</th>
    </tr>
    <tr>
      <th>Product Image</th>
      <th><img src="{{asset($productInfoById->productImage)}}" alt="{{$productInfoById->productName}}" height="200" width="200"></th>
    </tr>
    <tr>
      <th>Publication Status</th>
      <th>{{$productInfoById->publicationStatus == 1 ? 'Published' :'Unpublished'}}</th>
    </tr>
  </table>
  <a href="{{url('/product/manage')}}" class="btn btn-success btn-block">Back To Manage Product</a>
      </div>
    </div>
  </div>
@endsection