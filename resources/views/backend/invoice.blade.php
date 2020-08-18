<!DOCTYPE html>
<html>
<head>
	<title>Inovoice</title>
	<style type="text/css">
		
		body{
			position: relative;
		    height: 100vh;
		    margin: 0;
		}
		h1{
			text-transform: capitalize;
			font-size: 16px;
			margin: 5px 0;
		}
		h2{
			text-transform: capitalize;
			font-size: 16px;
			margin: 5px 0;
		}
		p{
			text-transform: capitalize;
			font-size: 13px;
			margin: 5px 0;
		}
		tr, td{
			text-transform: capitalize;
		}
		.body-content{
			position: absolute;
		    width: 70%;
		    left: 50%;
		    top: 0;
		    transform: translateX(-50%);
		    box-shadow: #E5E5E5 0px 0px 11px 5px;
		    overflow: hidden;
		    border: 10px solid #F05F30;
		}
		.topbar{
			background-position: bottom;
		    background-repeat: no-repeat;
		    background-size: cover;
		    padding: 20px 40px;
		    position: relative;
		    width: 100%;
		    left: -25px;
		    top: 0;
		    display: flex;
		}
		.topbar-logo img{
			width: 30%;
		}
		.topbar-dark-img{
			position: absolute;
		    width: 100%;
		    height: 100%;
		    top: 0;
		    left: 0;
		}
		.topbar-dark-img img{
			position: absolute;
		    right: 40px;
		    width: 30%;
		    top: -100px;
		}
		.topbar-bottom{
			width: 100%;
			display: flex;
			background: #F5F6F6;
    		padding: 20px 0;
		}
		.topbar-bottom .left, .topbar-bottom .right{
			padding: 0 15px;
		}
		.topbar-table{
			width: 100%;
		}
		.topbar-table{
			padding: 15px 0;
		}
		.topbar-table table{
			padding: 0 15px;
		}
		.topbar-table table tr td{
			width: 16.66%;
			text-align: center;
			font-size: 13px;
		}
		.topbar-payment{
			width: 100%;
			display: flex;
		}
		.topbar-payment .left, .topbar-payment .right{
			width: 50%;
			padding: 0 15px;
		}
		.topbar-payment .right .right-box{
			background-color: #F2F4F7;
			display: flex;
			width: 100%;
		}
		.topbar-payment .right .right-box .left-part,
		.topbar-payment .right .right-box .right-part{
			width: 50%;
			text-align: center;
		}
		.topbar-payment .right .right-box .left-part p,
		.topbar-payment .right .right-box .right-part p{
			margin: 5px 0;
		}
		.sign-option p{
			position: relative;
		}
		.sign-option p::after{
			content: "";
			background: #000000;
		    position: absolute;
		    left: 50%;
		    top: -5px;
		    height: 1px;
		    width: 50%;
		    z-index: 3;
		    transform: translateX(-50%);
		}
		.bottom-style{
			background-size: cover;
    		background-position: center;
    		height: 10vh;
		}
		.topbar-table table tbody tr td{
			border-top: 1px solid #BCBDC0;
		    border-right: 1px solid #BCBDC0;
		    border-bottom: 1px solid #BCBDC0;
		}
		.topbar-table table tbody tr td:last-child{
			border-right: none;
		}
		.topbar-payment table tbody tr td{
			border-top: 1px solid #BCBDC0;
		    border-right: 1px solid #BCBDC0;
		    border-bottom: 1px solid #BCBDC0;
		}
		.topbar-payment table tbody tr td:last-child{
			border-right: none;
		}
		.topbar-payment .right td{
			width: 50%;
			text-align: center;
			padding: 5px;
		}
		.footer-option{
			width: 100%;
			display: flex;
			padding: 20px 15px;
		}
		.footer-option .right p{
			text-transform: lowercase;
		    text-align: center;
		    position: absolute;
		    left: 50%;
		    top: 50%;
		    transform: translate(-50%,-50%);
		}
	</style>
</head>
<body style="position: relative;">
	<!-- body content start -->
	<div class="body-content">
		
		<!-- topbar start -->
		<div class="topbar">
			<!-- topbar left start -->
			<div class="topbar-logo" style="width: 33.33%;">
				<img src="{{asset('images/logo/3.png')}}">
			</div>
			<!-- topbar left end -->
			
			<!-- topbar middle start -->
			<div class="topbar-ssttech-info" style="width: 33.33%;">
				<h2 style="color: #F69420">ABC Ceiling Fan</h2>
				<p>4036,Matuail Medical Road Kadamtoli,</p>
				<p> Dhaka-1362, Dhaka,</p>
 				<p> Bangladesh​</p>
			</div>
			<!-- topbar middle end -->
			<!-- topbar right start -->
			<div class="topbar-ssttech-info" style="width: 33.33%;">
				<h2 style="color: #F69420">Contact</h2>
				<p>+880 1711-784387</p>
				<p style="text-transform: lowercase">abcfanbd@gmail.com</p>
			</div>
			<!-- topbar right end -->
			
		</div>
		<!-- topbar end -->
		<!-- topbar bottom start -->
		<div class="topbar-bottom">
			
			<!-- left part start -->
			<div class="left" style="width: 50%">
				<h1>Invoice 
					
					@if ($invoice->status == 1)
						<span style="color: yellow;font-size:12px;background:#000;border-radius:5px;padding:0 2px;">Pending</span>
						
					@endif

					@if ($invoice->status == 2)
						<span style="color: green;font-size:12px;background:#000;border-radius:5px;padding:0 2px;">Confirmed</span>
						
					@endif

					@if ($invoice->status == 3)
						<span style="color: red;font-size:12px;background:#000;border-radius:5px;padding:0 2px;">Delivered</span>
						
					@endif


			
			
			
			
			
			
			</h1>
				<h2>Invoice No : <span style="text-transform: lowercase">#{{$invoice->invoice_sl}}</span> </h2>
				<h2>Invoice Date : {{$invoice->created_at->format('d/m/Y')}}</h2>
				<h2>Invoice to : {{$invoice->first_name}} {{$invoice->last_name}}</h2>
			</div>
			<!-- left part end -->
			<!-- left part start -->
			<div class="right" style="width: 50%">
				<h2>{{$invoice->address}}</h2>
		
				<h2>Phone : {{$invoice->phone}}</h2>
				<h2>Mail : {{$invoice->email}}</h2>
			</div>
			<!-- left part end -->
		</div>
		<!-- topbar bottom end -->
		<!-- topbar table start -->
		<div class="topbar-table">
			<table style="width: 100%;">
				<tr>
					<td style="color:#f05f30;"  >Sl.</td>
					<td style="color:#f05f30;" >Item description</td>
					
					<td style="color:#f05f30;" >Price</td>
					<td style="color:#f05f30;" >Qty</td>
					<td style="color:#f05f30;" >Total</td>
				</tr >
				<tbody >
					<!-- item loop start -->
					@foreach ($invoice->product as $key => $product)
						
					
						<tr>
							<td>{{$key+1}}.</td>
							<td>
								<h2>{{$product->product->name}}</h2>
								<p style="text-transform: lowercase;">#{{$product->product->code}}</p>
							</td>
							<td>{{$product->per_product_price}} tk</td>
							<td>{{$product->quantity}}</td>
							<td>{{$product->totalPrice}} Tk</td>
						</tr>
					@endforeach
					<!-- item loop end -->
				</tbody>
			</table>
		</div>
		<!-- topbar table end -->
		<!-- payment method start -->
		<div class="topbar-payment">
			<!-- left part start -->
			<div class="left">
				<div class="top">
					<h1 style="color: #F05F30">Payment Method</h1>
					<p>Cash On Delivery</p>
				</div>
				<div class="bottom" style="margin-top: 15px;">
					<h1 style="color: #F05F30">Term & Conditions</h1>
					<h1 style="color: #F05F30">Beway solve your payments and services solutions. </h1>
					<h1 style="color: #F05F30">Let your business more efficient & growth faster.</h1>
				</div>
			</div>
			<!-- left part end -->
			<!-- right part start -->
			<div class="right">
				<table style="width: 100%;">
					<tbody>
						<!-- item start -->
						<tr>
							<td>Shipping Cost</td>
							<td>100 tk</td>
						</tr>
						<!-- item end -->
						<!-- item start -->
						<tr>
							<td>Total</td>
							<td>{{$invoice->totalPrice+100}} Tk</td>
						</tr>
						<!-- item end -->
					</tbody>
				</table>

				@if ($invoice->note)
					<p>Note: {{$invoice->note}}</p>
				@endif
			</div>
			<!-- right part end -->
		</div>
		<!-- payment method end -->
		<!-- sign option start -->
		<div class="footer-option">
			
			<!-- left part start -->
			<div class="left" style="width: 50%;">
				<h1  style="color: #F05F30">Thank you</h1>
				<h1  style="color: #F05F30">For Your Business</h1>
			</div>
			<!-- left part end -->
			<!-- right part start -->
			<div class="right" style="width: 50%; position: relative;">
				<p style="text-transform: lowercasetext-transform:">www.abc.com</p>
			</div>
			<!-- right part end -->
		</div>
		<!-- sign option end -->
	</div>
	<!-- body content end-->
</body>
</html>