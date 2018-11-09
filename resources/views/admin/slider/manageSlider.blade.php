@extends('admin.master')

@section('content')
<hr>
<h3 class="text-center text-succss">{{Session::get('message')}}</h3>
<hr>
<h3 class="text-center">Total Numpers Of Slider: {{$sliders->total()}}</h3>
<h3 class="text-center">In This Page: {{$sliders->count()}}</h3>
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
			@foreach($sliders as $slider)
			<tbody>
				<tr>
					<td>{{$slider->id}}</td>
					<td><img src="{{asset($slider->sliderImage)}}" height="200" width="200"></td>
					<td>{{$slider->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
					<td>
						<a href="{{url('/slider/edit/'.$slider->id)}}" title="product edit" class="btn btn-success">
							<span class="glyphicon glyphicon-edit"></span>
						</a>
						
						<a href="{{url('/slider/delete/'.$slider->id)}}" title="product delete" class="btn btn-danger" onclick="return confirm('are you sure to delete this');">
							<span class="glyphicon glyphicon-trash"></span>
						</a>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		<div>
			{{ $sliders->links() }}
		</div>
		</div>
	</div>
</div>
@endsection