<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use DB;
use App\Customer;
use App\Payment;
use App\OrderDetail;
use App\Shipping;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $allOrders = DB::table('payments')
                     ->join('orders','payments.orderId','=','orders.id')
                     ->select('payments.*','orders.*')
                     ->paginate(5);

        // echo "<pre>";
        // print_r($allOrders);
        // exit();

        return view('admin.home.homeContent',compact('allOrders'));
    }

    public function showOrderDetails($id){

        $shippingDetailsByOrderId = DB::table('orders')
                          ->join('shippings','orders.shippingId','=','shippings.id')
                          ->join('customers','orders.customerId','=','customers.id')
                          ->select('orders.*','shippings.*','customers.*')
                          ->where('orders.id',$id)
                          ->first();


        $order_DetailsByOrderBy = DB::table('order_details')
                                ->join('orders','order_details.orderId','=','orders.id')
                                ->select('order_details.*','orders.*')
                                ->where('orders.id',$id)
                                ->first();


        // echo "<pre>";
        // print_r($order_DetailsByOrderBy);
        // exit();

        return view('admin.order.showOrderDetails',compact('shippingDetailsByOrderId','order_DetailsByOrderBy'));
    }

    public function editOrderDetails($id){

        $orderById = Order::where('id',$id)->first();
        // return $orderById;

        return view('admin.order.editOrderDetailsForm',compact('orderById'));
    }

    public function updateOrderDetails(Request $request){
            
            $id=$request->orderId;
            $order=Order::find($id);
            $order->orderStatus=$request->orderStatus;
            $order->save();

            // return $order;
            // $orderById->orderStatus = $request->orderStatus;
            // $orderById->save();

            return redirect('/dashbord')->with('message','Order Status Update SuccssFull');
    }
}
