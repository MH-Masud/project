<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use App\Shipping;
use App\Order;
use App\Payment;
use App\OrderDetail;
use Cart;
use DB;

class CheckoutController extends Controller
{
    public function checkout(){

    	return view('frontEnd.checkout.checkoutContent');
    }

    public function register(){

    	return view('frontEnd.checkout.registerContent');
    }

    public function customerRegister(Request $request){

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password) ; 
        $customer->phone = $request->phone ;  
        $customer->save();
        $customerId = $customer->id;
        $customerName=$request->name;

        Session::put('customerId',$customerId);
        Session::put('customerName',$customerName);
        
        return redirect('/checkout/shipping');
    }

    public function showShippingForm(){
        
       $getCustomerId = Session::get('customerId');
       $customerById = Customer::where('id',$getCustomerId)->first();

    	return view('frontEnd.checkout.shippingContent',compact('customerById'));
    }

    public function saveShipping(Request $request){

        $shipping = new Shipping();

        $shipping->fullName = $request->fullName ;
        $shipping->email = $request->email ; 
        $shipping->phoneNumber = $request->phoneNumber ; 
        $shipping->address = $request->address ; 
        $shipping->save();
       
        $shippingId = $shipping->id;
        Session::put('shippingId',$shippingId);
        return redirect('/checkout/payment');
    }

    public function showPaymentForm(){

        return view('frontEnd.payment.showPaymentForm');
    }

    public function saveOrderInfo(Request $request){

        $paymentType = $request->paymentType;
        
        if ($paymentType == 'cashOnDelivery') {
            
            $order = new Order();
            $order->customerId=Session::get('customerId');
            $order->shippingId=Session::get('shippingId');
            $order->orderTotal=Session::get('orderTotal');
            $order->save();

            $orderId=$order->id;
            Session::put('orderId',$orderId);

            $payment = new Payment();
            $payment->orderId=Session::get('orderId');
            $payment->paymentType=$paymentType;
            $payment->save();

            $paymentId=$payment->id;
            Session::put('paymentId',$paymentId);

            // $orderdetail = new OrderDetail();
            $cartProducts=Cart::getContent();
            
            // foreach ($cartProducts as $cartProduct ) {

            //     return $cartProduct->id;
                
            // $orderdetail->orderId=Session::get('orderId');
            // $orderdetail->productId=$cartProduct->id;
            // $orderdetail->productName=$cartProduct->name;
            // $orderdetail->productPrice=$cartProduct->price;
            // $orderdetail->productQuantity=$cartProduct->quantity;
            // $orderdetail->save();
            // }

            $odata=array();

            foreach ($cartProducts as $cartProduct) {
                
                $odata['orderId']=Session::get('orderId');
                $odata['productId']=$cartProduct->id;
                $odata['productName']=$cartProduct->name;
                $odata['productPrice']=$cartProduct->price;
                $odata['productQuantity']=$cartProduct->quantity;

                DB::table('order_details')
                   ->insert($odata);
            }

            Cart::clear();
            return redirect('/checkout/home');

        }elseif ($paymentType == 'bkash') {
            return view('frontEnd.payment.underconstructionPayment');
        }elseif ($paymentType == 'paypal') {
            return view('frontEnd.payment.underconstructionPayment');
        }


    }

    public function customerHome(){

        return view('frontEnd.checkout.customerHome');
    }

    public function login(Request $request){

        $email=$request->email;
        $password=md5($request->password);
        $coustomer_data= Customer::where('email',$email)
                             ->where('password',$password)
                             ->first();


        if ($coustomer_data) {
            
            return redirect('/checkout/shipping');
        }

        else{

            return redirect('/checkout')->with('message','Invalid Email & Password.');
        }
    }
}
