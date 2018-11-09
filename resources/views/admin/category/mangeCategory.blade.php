@extends('admin.master')

@section('content')
<hr>
<div class="container">
	<div class="row">
		<h3 class="text-center text-succss">{{Session::get('message')}}</h3>
		<div class="col-lg-10 ">
			<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Category Name</th>
					<th>Category Description</th>
					<th>Category Description</th>
					<th>Action</th>
				</tr>
			</thead>
			@foreach($categories as $category)
			<tbody>
				<tr>
					<td>{{ $category->id}}</td>
					<td>{{ $category->categoryName}} </td>
					<td>{{ $category->categoryDescription}} </td>
					<td>{{ $category->categoryStatus == 1 ? 'Published':'Unpublished'}} </td>
					<td>
						<a href="{{url('/category/edit/'.$category->id)}}" class="btn btn-success">
							<span class="glyphicon glyphicon-edit"></span>
						</a>
						<a href="{{url('/category/delete/'.$category->id)}}" class="btn btn-danger" onclick="return confirm('are you sure to delete this');">
							<span class="glyphicon glyphicon-trash"></span>
						</a>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		</div>
	</div>
</div>
@endsection