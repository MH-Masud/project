<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Cart;
class CartController extends Controller
{
    public function addToCart(Request $request){
        
         
        $productid = $request->productId;
        $productById = Product::where('id',$productid)->first();

        
        $data['id']=$productById->id;
        $data['name']=$productById->productName;
        $data['price']=$productById->productPrice;
        $data['quantity']=$request->productQuantity;
        $data['attributes']['image']=$productById->productImage;

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        Cart::add($data);

        return redirect('/add_cart');
    }

    public function addCart(){

    	$allCategory = Category::where('categoryStatus',1)->first();

    	return view('frontEnd.cart.cartContent',compact('allCategory'));
    }

    public function deleteCartItem($id){

    	Cart::remove($id);
    	return redirect('/add_cart');
    }

    public function update(Request $request){

        // $data['quantity']=$request->productQuantity;
        // $data['quantity']['relative'] = false;
        $id=$request->productId;
        // Cart::update($id,$data);

        Cart::update($id, array(
  'quantity' => array(
      'relative' => false,
      'value' => $request->productQuantity
  ),
));

        return redirect('/add_cart');
    }
}
