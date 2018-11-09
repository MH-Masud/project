@extends('frontEnd.master')

@section('mainContent')
<div class="page-head">
	<div class="container">
		<h3>{{$manufacturesById->manufactureName}}</h3>
	</div>
</div>
<!-- //banner -->
<!-- mens -->
<div class="men-wear">
	<div class="container">
		
		<div class="single-pro">
			
			@foreach($productsByManufactureId as $productByManufactureId)
			<div class="col-md-3 product-men yes-marg">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="{{asset($productByManufactureId->productImage)}}" height="200" width="200" alt="" class="pro-image-front">
									<img src="{{asset($productByManufactureId->productImage)}}" height="200" width="200" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="{{url('/details/'.$productByManufactureId->id)}}" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
								</div>
								<div class="item-info-product ">
									<h4><a href="{{url('/details/'.$productByManufactureId->id)}}">{{$productByManufactureId->productName}}</a></h4>
									<div class="info-product-price">
										<span class="item_price">{{$productByManufactureId->productPrice}}</span>
										<del>$69.71</del>
									</div>
									<a href="{{url('/details/'.$productByManufactureId->id)}}" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>
						@endforeach
			<div class="clearfix"></div>
		</div>
		<div class="pagination-grid text-right">
			{{$productsByManufactureId->links()}}
		</div>
	</div>
</div>	
<!-- //mens -->
@endsection