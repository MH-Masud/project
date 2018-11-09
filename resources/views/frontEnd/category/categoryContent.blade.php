@extends('frontEnd.master')

@section('mainContent')
<div class="page-head">
	<div class="container">
		<h3>{{$categoryById->categoryName}}</h3>
	</div>
</div>
<!-- //banner -->
<!-- mens -->
<div class="men-wear">
	<div class="container">
		<div class="col-md-4 products-left">
			<div class="filter-price">
				<h3>Filter By Price</h3>
					<ul class="dropdown-menu6">
						<li>                
							<div id="slider-range"></div>							
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>			
					</ul>
							<!---->
							<script type='text/javascript'>//<![CDATA[ 
							$(window).load(function(){
							 $( "#slider-range" ).slider({
										range: true,
										min: 0,
										max: 9000,
										values: [ 1000, 7000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
										}
							 });
							$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

							});//]]>  

							</script>
						<script type="text/javascript" src="{{asset('public/frontEnd/js/jquery-ui.js')}}"></script>
					 <!---->
			</div>
			<div class="css-treeview">
				<h4>Brand's</h4>
				<ul class="tree-list-pad">
					@foreach($publishedManufactures as $publishedManufacture)
					<li>
						<a href="{{url('/category-brand/'.$publishedManufacture->id)}}" >{{$publishedManufacture->manufactureName}}</a>
							
					</li>
					@endforeach
				</ul>
			</div>
			<div class="community-poll">
				<h4>Community Poll</h4>
				<div class="swit form">	
					<form>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>More convenient for shipping and delivery</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Lower Price</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Track your item</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Bigger Choice</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>More colors to choose</label> </div></div>	
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Secured Payment</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Money back guaranteed</label> </div></div>	
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Others</label> </div></div>		
					<input type="submit" value="SEND">
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			<h5>Product Compare(0)</h5>
			<div class="sort-grid">
				<div class="sorting">
					<h6>Sort By</h6>
					<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">Default</option>
						<option value="null">Name(A - Z)</option> 
						<option value="null">Name(Z - A)</option>
						<option value="null">Price(High - Low)</option>
						<option value="null">Price(Low - High)</option>	
						<option value="null">Model(A - Z)</option>
						<option value="null">Model(Z - A)</option>					
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="sorting">
					<h6>Showing</h6>
					<select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">7</option>
						<option value="null">14</option> 
						<option value="null">28</option>					
						<option value="null">35</option>								
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="men-wear-top">
				<script src="{{asset('public/frontEnd/js/responsiveslides.min.js')}}"></script>
				<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						 // Slideshow 4
						$("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
							}
							});
						});
				</script>
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						@foreach($inRandomOrderPublishedProductsByCategoryId as $inRandomOrderPublishedProductByCategoryId)
						<li>
							<img class="img-responsive" src="{{asset($inRandomOrderPublishedProductByCategoryId->productImage)}}" height="700" width="150" alt=" "/>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="men-wear-bottom">
				
				<div class="col-sm-8 men-wear-right">
					<h4>Exclusive {{$categoryById->categoryName}} Collections</h4>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
					accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae 
					ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
					explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
					odit aut fugit. </p>
				</div>
				<div class="clearfix"></div>
			</div>
			    @foreach($latestPublishedProductsByCategoryId as $latestPublishedProductByCategoryId)
				<div class="col-md-4 product-men no-pad-men">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="{{asset($latestPublishedProductByCategoryId->productImage)}}" alt="" class="pro-image-front">
							<img src="{{asset($latestPublishedProductByCategoryId->productImage)}}" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="{{url('/details/'.$latestPublishedProductByCategoryId->id)}}" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
						</div>
						<div class="item-info-product ">
									<h4><a href="{{url('/details/'.$latestPublishedProductByCategoryId->id)}}">{{$latestPublishedProductByCategoryId->productName}}</a></h4>
									<div class="info-product-price">
										<span class="item_price">{{$latestPublishedProductByCategoryId->productPrice}}</span>
										<del>$69.71</del>
									</div>
									<a href="{{url('/details/'.$latestPublishedProductByCategoryId->id)}}" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
						</div>
					</div>
				</div>
				@endforeach
				
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		<div class="single-pro">
			@foreach($productsBySubcategoryIdUnderCategoryId as $subCategoryProduct)
			<div class="col-md-3 product-men yes-marg">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="{{asset($subCategoryProduct->productImage)}}" height="200" width="200" alt="" class="pro-image-front">
									<img src="{{asset($subCategoryProduct->productImage)}}" height="200" width="200" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="{{url('/details/'.$subCategoryProduct->id)}}" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
								</div>
								<div class="item-info-product ">
									<h4><a href="{{url('/details/'.$subCategoryProduct->id)}}">{{$subCategoryProduct->productName}}</a></h4>
									<div class="info-product-price">
										<span class="item_price">price</span>
										<del>$69.71</del>
									</div>
									<a href="{{url('/details/')}}" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>
						@endforeach
			<div class="clearfix"></div>
		</div>
		<div class="pagination-grid text-right">
			{{$productsBySubcategoryIdUnderCategoryId->links()}}
		</div>


		
	</div>
</div>	
@endsection