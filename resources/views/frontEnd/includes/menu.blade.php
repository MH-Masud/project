<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a></li>
					@foreach($categories as $category)
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$category->categoryName}} <span class="caret"></span></a>
						
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									
	                                @foreach($category->subcategories as $subCategory)
									<div class="col-sm-3 multi-gd-img">
										
										<ul class="multi-column-dropdown">

											<li><a href="{{url('/subcategory/'.$category->id.'/'.$subCategory->id)}}">{{$subCategory->subCategoryName}}</a></li>
											
										</ul>
										
									</div>
									@endforeach
									<div class="clearfix"></div>
								</div>
							</ul>
							
					</li>
					@endforeach
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="cart box_1">
						<a href="{{url('/add_cart')}}">
							<h3> <div class="total">
								<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
								Total Item:
								<?php $cartCollection = Cart::getContent(); ?>
		                      {{$cartCollection->count()}}
		                  </div>
							</h3>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Cart</a></p>
						
			</div>	
		</div>
		<div class="clearfix"></div>
	</div>
</div>