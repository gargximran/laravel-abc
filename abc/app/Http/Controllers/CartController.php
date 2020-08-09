<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use Cart;
use Session;
class CartController extends Controller
{
    public function addtocart(Request $request){
       $id= $request->id;
        $product= Product::find($id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'quantity' =>$request->cart_qty, 
            'price' =>$request->cart_price, 
            'weight'=>1,
            'attributes' => array(
                'image' => $product->images,
                
              )
            
            ]);
            return back();
            $cart = Cart::getContent();
            // return response()->json([('ok')]);
    }
    public function checkout(){

       $custemer_id=Session::get('customer_id');
        if($custemer_id>0){
       $customer=Customer::find($custemer_id);
        $cart = Cart::getContent();
        return view('frontend.checkout.cartProduct',['cart'=>$cart,'customer'=>$customer]);
    }else{
        return redirect('/customer/login');
    }
    }
    public function cartRemove($id){
        Cart::remove($id);
        return back();
    }
    public function cartUpdate(Request $request){
        $id=$request->id;
        Cart::update($id,array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->update_qty,
            ),));
            return back();
    }
}
