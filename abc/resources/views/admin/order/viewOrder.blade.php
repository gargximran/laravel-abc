<!DOCTYPE html>
<html>
<head>
	<title>{{$cusinfo->name}}-amru00{{$cusinfo->id}}</title>
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
		}
		.topbar{
			background-position: bottom;
		    background-repeat: no-repeat;
		    background-size: cover;
		    padding: 40px;
		    position: relative;
		    width: 100%;
		    left: -25px;
		    top: 0;
		}
		.topbar-logo img{
			width: 10%;
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
			padding: 0;
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
			padding: 5px;
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
		.sign-option{
			width: 100%;
			display: flex;
		}
		.sign-option{
			padding: 50px 0 0 15px;
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
		.topbar-table table tbody tr{
			background: #F2F4F7;
		}
		.topbar-table table tbody tr:nth-child(odd){
			background: #E9ECF2;
		}	
		.topbar-payment .right td{
			width: 50%;
			text-align: center;
		}
		.topbar-payment .right table tbody tr{
			background: #F2F4F7;
		}
		.topbar-payment .right table tbody tr:nth-child(odd){
			background: #E9ECF2;
		}
	</style>
</head>
<body style="position: relative;">
	<!-- body content start -->
	<div class="body-content">
        <button id="printpagebutton"class="btn-danger" onclick="printpage2()">Print</button>
		<!-- topbar start -->
		<div class="topbar" style="background-image: url(images/invoice.png);">
			<!-- topbar left start -->
			<div class="topbar-logo" style="width: 50%;">
				<img src="{{asset('public/frontend/images/logo.png')}}">
			</div>
			<!-- topbar left end -->
			<!-- dark image start -->
			<div class="topbar-dark-img">
				<img src="images/dot.png">
            </div>
            
			<!-- dark image end -->
		</div>
		<!-- topbar end -->
		<!-- topbar bottom start -->
		<div class="topbar-bottom">
			
			<!-- left part start -->
			<div class="left" style="width: 50%">
            <h2>Invoice :amru00{{$cusinfo->id}}</h2>
				<h2>Order Date:{{$cusinfo->created_at}}</h2>
			</div>
			<!-- left part end -->
			<!-- left part start -->
			<div class="right" style="width: 50%">
            <h2>Name :{{$cusinfo->name}}</h2>
                <h2>Phone:{{$cusinfo->phone}}</h2>
                <h2>Address:{{$cusinfo->address}}</h2>
			</div>
			<!-- left part end -->
		</div>
		<!-- topbar bottom end -->
		<!-- topbar table start -->
		<div class="topbar-table">
			<table style="width: 100%;">
				<tr>
					<td style="background-color: #502A6A; color:white;"  >Image.</td>
					<td style="background-color: #BE2670; color:white;" >Item description</td>
					<td style="background-color: #502A6A; color:white;" >Price</td>
					<td style="background-color: #BE2670; color:white;" >Qty</td>
					<td style="background-color: #502A6A; color:white;" >Total</td>
				</tr>
				<tbody>
                    <!-- item start -->
                    <?php $ordertotal=0;?>
                    @foreach ($orderdetails as $item)
                     @php                         
                       $ordertotal +=$item->productPrice *$item->productQuantity 
                       @endphp 
                   
					<tr>
                        <td>  <img src="{{asset('public/images/'.$item->images)}}" alt="" height="40px" width="50px">  </td>
						<td>{{$item->productName}}</td>
						<td>{{$item->productPrice}} Tk</td>
						<td>{{$item->productQuantity}}</td>
						<td>{{$item->productPrice*$item->productQuantity}}Tk</td>
					</tr>
					<!-- item end -->
                    @endforeach
				</tbody>
			</table>
		</div>
		<!-- topbar table end -->
		<!-- payment method start -->
		<div class="topbar-payment">
			<!-- left part start -->
			<div class="left">
				<h1>Payment Method</h1>
				<p>Cash On Delivery</p>
			</div>
			<!-- left part end -->
			<!-- right part start -->
			<div class="right">
				<table style="width: 100%;">
					<tbody>
						<!-- item start -->
						<tr>
							<td>subtotal</td>
							<td>{{$ordertotal}}</td>
						</tr>
						<!-- item end -->
						<!-- item start -->
						{{-- <tr>
							<td>Tax</td>
							<td>1000</td>
						</tr>
						<!-- item end -->
						<!-- item start -->
						<tr>
							<td>discount</td>
							<td>50%</td>
						</tr>
						<!-- item end -->
						<!-- item start -->
						<tr>
							<td>coupon</td>
							<td>AERFGET</td>
						</tr> --}}
						<!-- item end -->
					</tbody>
					{{-- <tr>
						<td style="background-color: #BE2670; color:white;"  >total</td>
						<td style="background-color: #502A6A; color:white;" >Fourty Thousand Taka</td>
					</tr> --}}
				</table>
			</div>
			<!-- right part end -->
		</div>
		<!-- payment method end -->
		<!-- sign option start -->
		<div class="sign-option">
			<!-- sign one start -->
			<div class="sign-one" style="width: 50%; text-align: center;">
				<p>sign one</p>
			</div>
			<!-- sign one end -->
			<!-- sign two start -->
			<div class="sign-two" style="width: 50%;text-align: center;">
				<p>sign two</p>
			</div>
			<!-- sign two end -->
		</div>
		<!-- sign option end -->
		<!-- bottom style start -->
		<div class="bottom-style" style="background-image: url(images/invoice2.png);" >
		</div>
		<!-- bottom style end -->
	</div>
    <!-- body content end-->
    <script>
            function printpage2() {
              
              var printButton = document.getElementById("printpagebutton");
              var printpagefooter = document.getElementById("printpagefooter");
             
            
              printButton.style.visibility = 'hidden';
           
              window.print()
              printButton.style.visibility = 'visible';
               
          }
       </script>
</body>
</html>