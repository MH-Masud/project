@extends('admin.master')

@section('content')
<hr>
<h3 class="text-center">{{Session::get('message')}}</h3>
<hr>
<div class="container">
	<div class="row">
		
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
			@foreach($manufactureinfo as $info)
			<tbody>
				<tr>
					<td> {{$info->id}} </td>
					<td> {{$info->manufactureName}} </td>
					<td> {{$info->manufactureDescription}} </td>
					<td> {{$info->manufactureStatus == 1 ? 'Published':'Unpublished'}} </td>
					<td>
						<a href="{{url('/manufacture/edit/'.$info->id)}}" class="btn btn-success">
							<span class="glyphicon glyphicon-edit"></span>
						</a>
						<a href="{{url('/manufacture/delete/'.$info->id)}}" class="btn btn-danger" onclick="confirm('are you sure to delete this');">
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