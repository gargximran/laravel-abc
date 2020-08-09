<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Orderdetail;
use App\Product;
use App\Shippinng;
use App\Customer;
use DB;
class OrderController extends Controller
{
    public function index(){
      $orderPending=DB::table('orders')
      ->join('shippings','orders.shippingId','=','shippings.id') 
      ->where('orders.orderStatus','pending')   
      ->select('orders.*','shippings.name','shippings.phone','shippings.address','shippings.note')
      ->get();

      return view('admin.order.orderRequest',['orderPending'=>$orderPending]);
  }
  public function confirm($id){
      $orderconfirm=Order::find($id);
      $orderconfirm->orderStatus='confirm';
      $orderconfirm->save();
      return redirect('/admin/order/confirmlist');
  }
  public function confirmlist(){
    $orderPending=DB::table('orders')
    ->join('customers','orders.customerId','=','customers.id')
    ->join('shippings','orders.shippingId','=','shippings.id')
    ->where('orders.orderStatus','confirm')  
    ->select('orders.*','customers.*','shippings.*')
    ->get();
    return view('admin.order.orderConfirmlist',['orderPending'=>$orderPending]);
}
  public function vieworder($id){
      $orderdetails=DB::table('orderdetails')
      ->join('products','orderdetails.productId','=','products.id')     
      ->where('orderdetails.orderId',$id)
      ->select('orderdetails.*','products.images')
      ->get();
     $cusShipping= DB::table('orders')
      ->join('shippings','orders.shippingId','=','shippings.id') 
      ->where('orders.id',$id)   
      ->select('orders.*','shippings.name','shippings.phone','shippings.address','shippings.note')
      ->first();
  
        return view('admin.order.viewOrder',['orderdetails'=>$orderdetails,'cusinfo'=>$cusShipping]);
  }
  public function orderdelete($id){
    $order=Order::find($id);
    $order->delete();
    $orderdetl=Orderdetail::where('orderId',$id);
    $orderdetl->delete();
    return back();

  }
}
