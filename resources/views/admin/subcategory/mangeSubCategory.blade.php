@extends('admin.master')

@section('content')
<hr>
<h3 class="text-center text-succss">{{Session::get('message')}}</h3>
<hr>
<h3 class="text-center">Total Numpers Of Sub-Category: {{$allSubcategories->total()}}</h3>
<h3 class="text-center">In Current Page: {{$allSubcategories->count()}}</h3>
<hr>
<div class="container">
	<div class="row">
		
		<div class="col-lg-10 ">
			<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Sub Caategory Name</th>
					<th>Category Name</th>
					<th>Manuffacture Name</th>
					<th>Sub Category Description</th>
					<th>Publication Status</th>
					<th>Action</th>
				</tr>
			</thead>
			@foreach($allSubcategories as $subcategory)
			<tbody>
				<tr>
					<td>{{$subcategory->id}}</td>
					<td>{{$subcategory->subCategoryName}}</td>
					<td>{{$subcategory->categoryName}} </td>
					<td>{{$subcategory->manufactureName}} </td>
					<td>{!!$subcategory->subCategoryDescription!!}</td>
					<td>{{$subcategory->subCategoryStatus == 1 ? "Published" : "Unpublished"}}</td>
					<td>

						<a href="{{url('/sub-category/edit/'.$subcategory->id)}}" title="product edit" class="btn btn-success">
							<span class="glyphicon glyphicon-edit"></span>
						</a>
						
						<a href="{{url('/sub-category/delete/'.$subcategory->id)}}" title="product delete" class="btn btn-danger" onclick="return confirm('are you sure to delete this');">
							<span class="glyphicon glyphicon-trash"></span>
						</a>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		<div>
			{{$allSubcategories->links()}}
		</div>
		</div>
	</div>
</div>
@endsection