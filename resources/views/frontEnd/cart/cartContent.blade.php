@extends('frontEnd.master')

@section('mainContent')
  <div class="page-head">
	<div class="container">
		<h3>Check Out</h3>
	</div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<?php
           
           $cartCollection = Cart::getContent();
          Session::put('orderTotal',Cart::getSubTotal());
		?>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Product</th>
						<th>Quantity</th>
						
						<th>Product Name</th>
						<th>Per Product Price</th>
						<th>Total Price</th>
					</tr>
				</thead>
                    @foreach($cartCollection as $show)
					<tr class="rem1">
						<td>
							<a href="{{url('/delete-cart-item/'.$show->id)}}"><span class="glyphicon glyphicon-remove-sign"></span></a>
						</td>
						<td class="invert-image"><a href="single.html"><img src="{{asset($show->attributes->image)}}" alt="" class="img-responsive" /></a></td>
						<td class="invert">
							 <div class="quantity">
							 	{!! Form::open(['class'=>'form-inline','method'=>'post','url'=>'/cart_update_quantity']) !!} 
								    <div class="form-group"> 
								   	   <input style="text-align: center;" type="number" name="productQuantity" class =" form-control" value="{{$show->quantity}}">  
								   	</div>
								   	<div class="form-group">
								   		<input type="hidden" name="productId" value="{{$show->id}}">
								   	</div>
									<div class="form-group">
									   
									   	 <button type="submit" name="submit"><span class="glyphicon glyphicon-check"></span></button>
									</div>
								{!! Form::close()!!}
							</div>
						</td>
						<td class="invert">{{$show->name}}</td>
						<td class="invert">{{$show->price}}</td>
						<td class="invert">{{$show->price*$show->quantity}}</td>
					</tr>
					@endforeach

								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
			</table>
		</div>
		<div class="checkout-left">	
				
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					 <?php
                       
                       $customerId=Session::get('customerId');
                       $shippingId=Session::get('shippingId');

                       if ($customerId != null && $shippingId != null && $cartCollection->count() >0 ) {
                       
                    ?>
                    <a href="{{url('/checkout/payment')}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Checkout</a>
                    <?php  } elseif ($customerId !== null && $cartCollection->count() >0) { ?>

                    <a href="{{url('/checkout/shipping')}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Checkout</a>
                    <?php } else if( $cartCollection->count() == 0) { ?>

                    <a href="{{url('/add_cart')}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Checkout</a>
                    <?php } else{ ?>

                    <a href="{{url('/checkout')}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Checkout</a>
                    <?php } ?>
                    <br><br>
                    
                    {{-- <a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a> --}}
					
                   <a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
                   
				</div>
				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					
					<h4>Shopping basket</h4>
					<ul>
                        @foreach($cartCollection as $show)
						<li>{{$show->name}}<i>-</i> <span>{{$show->price*$show->quantity}}</span></li>
						@endforeach
						<li>Total <i>-</i> <span>{{Cart::getSubTotal()}}</span></li>
                        
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
	</div>
</div>	
<!-- //check out -->
<!-- //product-nav -->

@endsection