<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use App\Orderdetail;
use App\Shipping;
use Cart;
use DB;
use Session;
class CheckoutController extends Controller
{
    public function orderProduct(Request $request){
        $shipping=new Shipping;
        $shipping->name=$request->first_name.' '.$request->last_name;
        $shipping->address=$request->address;
        $shipping->phone=$request->phone;
        $shipping->note=$request->note;
        $shipping->save();
        $shipping_id=$shipping->id;
        Session::put('shipping_id',$shipping_id);

        $order=new order;
        $order->customerId=Session::get('customer_id');
        $order->shippingId=Session::get('shipping_id');
        $order->payment_type=$request->payment_type;
        $order->orderTotal=Cart::getSubTotal();
        $order->save();
        $order_id=$order->id;
        Session::put('order_id',$order_id);
      
        $cart = Cart::getContent();
            $orderDetail=array();				
          foreach($cart as $id => $cartProduct){

                $orderDetail['orderId'] = Session::get('order_id');
                $orderDetail['productId'] = $cartProduct['id'];
                $orderDetail['productName'] = $cartProduct['name'];
                $orderDetail['productPrice'] = $cartProduct['price'];
                $orderDetail['productQuantity'] = $cartProduct['quantity'];
                DB::table('orderdetails')
                ->insert( $orderDetail);
                Cart::clear();
              }
             
              
          
            return redirect('/');

   }
}
