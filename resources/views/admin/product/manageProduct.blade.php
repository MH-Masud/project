@extends('admin.master')

@section('content')
<hr>
<h3 class="text-center text-succss">{{Session::get('message')}}</h3>
<hr>
<h3 class="text-center">Total Numpers Of Products: {{$productsInfo->total()}}</h3>
<h3 class="text-center">Current Page Products: {{$productsInfo->count()}}</h3>
<hr>
<div class="container">
	<div class="row">
		
		<div class="col-lg-10 ">
			<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Category Name</th>
					<th>Manuffacture Name</th>
					<th>Product Price</th>
					<th>Product Quantity</th>
					<th>Publication Status</th>
					<th>Action</th>
				</tr>
			</thead>
			@foreach($productsInfo as $product)
			<tbody>
				<tr>
					<td>{{$product->productName}}</td>
					<td>{{$product->categoryName}} </td>
					<td>{{$product->manufactureName}} </td>
					<td>TK.{{$product->productPrice}}</td>
					<td>{{$product->productQuantity}}</td>
					<td>{{$product->publicationStatus == 1 ? "Published" : "Unpublished"}}</td>
					<td>
                        <a href="{{url('/product/view/'.$product->id)}}" class="btn btn-info" title="product view">
							<span class="glyphicon glyphicon-info-sign"></span>
						</a>

						<a href="{{url('/product/edit/'.$product->id)}}" title="product edit" class="btn btn-success">
							<span class="glyphicon glyphicon-edit"></span>
						</a>
						
						<a href="{{url('/product/delete/'.$product->id)}}" title="product delete" class="btn btn-danger" onclick="return confirm('are you sure to delete this');">
							<span class="glyphicon glyphicon-trash"></span>
						</a>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		<div>
			{{$productsInfo->links()}}
		</div>
		</div>
	</div>
</div>
@endsection