<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use Illuminate\Http\Request;
use App\Cart;
use App\Invoice;
use App\ProductSale;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->id);

        $cart = Cart::where('product_id', $product->id)->where('ip', $request->ip())->first();

        
        if($cart){
            $cart->quantity+= 1;
            $cart->save();
        }else{
            $cart = new Cart();
            $cart->product_id = $product->id;
            $cart->ip = $request->ip();
            $cart->price = $product->offer_price != 0 ?  $product->offer_price : $product->regular_price;
            $cart->name = $product->name;
            $cart->image = $product->image[0]->name;
            $cart->quantity = 1;
            $cart->save();
        }


        return $this->Quantity($request);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

       
        $cart = Cart::where('ip', $request->ip())->get();
        return $cart;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cart = Cart::find($request->id);
        $cart->quantity = $request->quantity;
        $cart->save();


        $total = 0;

        $allCart = $this->show($request);

        foreach($allCart as $c){
            $total += $c->quantity * $c->price;
        }


        return response()->json(["quantity" => $this->Quantity($request), 'subTotal' => $cart->quantity* $cart->price, 'total' => $total ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cart = Cart::find($request->id);

        $cart->delete();

        $total = 0;

        $carts = Cart::where('ip', $request->ip())->get();

        foreach($carts as $ca){
            $total += $ca->price * $ca->quantity;
        }

        return response()->json(['Quantity'=> $this->Quantity($request),"total" => $total ], 200);
    }




    public function Quantity(Request $request){
        $quantity = 0;

        $carts = Cart::where('ip', $request->ip())->get();

        foreach($carts as $cart){
            $quantity+= $cart->quantity;
        }



        return $quantity;
    }




    public function checkoutPost(Request $request){
       

        
        if(count($this->show($request)) == 0){
            return redirect()->route('shop');
        }
    

        $request->validate([
            "payment_type" => "required",
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required"
        ]);


        $total = 0;

        foreach($this->show($request) as $c){
            $total += $c->quantity * $c->price;
        }




        $sl = Invoice::orderBy('id', 'desc')->first();

        $sli = $sl ? $sl->id + 1 : 1;

        $invoice = new Invoice();
        $invoice->first_name = $request->first_name;
        $invoice->last_name = $request->last_name;
        $invoice->email = $request->email;
        $invoice->phone = $request->phone;
        $invoice->address = $request->address;
        $invoice->note = $request->note;
        $invoice->ip = $request->ip();
        $invoice->status = 1;
        $invoice->invoice_sl = 'abc-'.$sli;
        $invoice->totalPrice = $total+100;
       
        if($invoice->save()){
            foreach($this->show($request) as $cartItem){
                $sale = new ProductSale();

                $product = Product::find($cartItem->product_id);

                $sale->Product()->associate($product);
                $sale->per_product_price = $product->offer_price ? $product->offer_price : $product->regular_price;
                $sale->quantity = $cartItem->quantity;
                $sale->totalPrice = $cartItem->quantity * $cartItem->price;
                $sale->product_code = $product->code;
                $sale->Invoice()->associate($invoice);
                $sale->ip = $request->ip();
                $sale->status = 1;
                $sale->save();

            }
        }







        foreach($this->show($request) as $cart){
            $cart->delete();
        }



        return redirect()->route('invoice_view_customer', $invoice->invoice_sl);


        
    }




    public function viewInvoiceCustomer(Invoice $invoice){

        return view('backend.invoice', compact('invoice'));
       
    }





    public function showPendingOrders(){
        $invoices = Invoice::orderBy('id', 'desc')->where('status', 1)->get();
        return view('backend.pages.orders.pending', compact('invoices'));
    }

    public function showPendingOrderInvoice(Invoice $invoice){
        return view('backend.invoice', compact('invoice'));
    }


    public function showConfirmedOrders(){
        $invoices = Invoice::orderBy('id', 'desc')->where('status', 2)->get();
        return view('backend.pages.orders.confirmed', compact('invoices'));
    }


    public function showDeliveredOrders(){
        $invoices = Invoice::orderBy('id', 'desc')->where('status',3)->get();
        return view('backend.pages.orders.delivered', compact('invoices'));
    }
}
