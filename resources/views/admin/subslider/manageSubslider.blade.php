@extends('admin.master')

@section('content')
<hr>
<h3 class="text-center text-succss">{{Session::get('message')}}</h3>
<hr>
<h3 class="text-center">Total Numpers Of Slider: </h3>
<h3 class="text-center">In This Page: </h3>
<hr>
<div class="container">
	<div class="row">
		
		<div class="col-lg-10 ">
			<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Image</th>
					<th>Publication Status</th>
					<th>Action</th>
				</tr>
			</thead>
			@foreach($subsliders as $subslider)
			<tbody>
				<tr>
					<td>{{$subslider->id}}</td>
					<td><img src="{{asset($subslider->subsliderImage)}}" height="200" width="200"></td>
					<td>{{$subslider->publicationStatus==1?'Published':'Unpublished'}}</td>
					<td>
						<a href="{{url('/sub-slider/edit/'.$subslider->id)}}" title="product edit" class="btn btn-success">
							<span class="glyphicon glyphicon-edit"></span>
						</a>
						
						<a href="{{url('/sub-slider/delete/'.$subslider->id)}}" title="product delete" class="btn btn-danger" onclick="return confirm('are you sure to delete this');">
							<span class="glyphicon glyphicon-trash"></span>
						</a>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		<div>
			{{$subsliders->links()}}
		</div>
		</div>
	</div>
</div>
@endsection