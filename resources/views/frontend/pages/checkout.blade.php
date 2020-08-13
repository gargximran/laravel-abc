@extends('frontend.template.layout')

@section('body-content')

<!-- checkout main section start -->
<section class="checkout section-padding wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
	<div class="container">
		<!-- progress row start -->
		<div class="row inline">
			<div class="col-md-12">
				<div class="progress-bar">
					
					<div class="step">
						<div class="step-box">
							<div class="bullet">
								<span>1</span>
								<div class="check">
									<i class="fas fa-check"> </i>
								</div>
							</div>
							<p>review order</p>
						</div>						
					</div>
					<div class="step">
						<div class="step-box">
							<div class="bullet">
								<span>2</span>
								<div class="check">
									<i class="fas fa-check"> </i>
								</div>
							</div>
							<p>shipping details</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- progress row end -->
		<!-- form item row start -->
		<div class="row">
			<div class="col-md-12">
				<div class="form-outer">
				 <div class="form">
						<!-- billing address start -->
						<div class="page slidepage review-order">
							
							
							<div class="row">
								<div class="col-md-12">
									<p>review order</p>
								</div>
							</div>
							<!-- review order row start -->
							<div class="row  ">
								<div class="col-md-12">
									<table>
										<tbody>
                                            
											<tr>
                                            <td><img src="" alt="" height="50px"></td>
												<td class="review-product-info">
													<h2></h2>
													<p> taka</p>
												</td>
												<td class="text-center">
                                                <form action="" method="POST">
                                                    @csrf
													<div class="row">
														<div class="col-md-6">
                                                        <input type="number" value="" class="number-spin form-control" name="update_qty">
                                                        <input type="hidden" value="" class="number-spin form-control" name="id">
														</div>
														<div class="col-md-6 update-qty">
															<button type="submit" >Update</button>
														</div>
                                                    </div>
                                                </form>
												</td>
												<td class="updated-price">
													<p> Taka</p>
												</td>
												<td class="updated-price">
                                                <a href="" >
														<i class="fas fa-trash"></i>
													</a>
												</td>
                                            </tr>
                                           
										</tbody>
									</table>
								</div>
							</div>
							<!-- review order row end -->
							<!-- review order row start -->
					
							<!-- review order row end -->
							<!-- sub total start -->
							<div class="row border">
								<div class="col-md-12">
									{{-- <h2>subtotal : </h2> --}}
								</div>
							</div>
							<!-- sub total end -->
							<!-- total start -->
							<div class="row border text-right">
								<div class="col-md-12">
									<p>free delivery</p>
								</div>
								<div class="col-md-12">
									<h2>total : taka</h2>
								</div>
							</div>
							<!-- total end -->
							<!-- page change start -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group text-right">
										<p class="next-1 next">next step</p>
									</div>
								</div>
							</div>
							<!-- page change end -->
							
							
						</div>
						<!-- billing address end -->
						<!-- shipping details start -->
						<div class="page review-order">
                            <form action="" method="post" >
                                @csrf
                            <div class="row border">
								<div class="col-md-12">
									<p class="payment-details">payment details</p>
								</div>
								<div class="col-md-12">
									<label class="custom_checkbox">
										direct bank transfer
										<br>
									  	<input value="bank"  type="radio" name="payment_type">
									  	<span class="checkmark"></span>
									</label>
								</div>
								<div class="col-md-12">
									<label class="custom_checkbox">cash On Delivery <br>
										
									  	<input type="radio" value="cod"  name="payment_type" checked>
									  	<span class="checkmark"></span>
									</label>
								</div>
								<div class="col-md-12">
									<label class="custom_checkbox">
										Bkash
										<br>
									  	<input type="radio" value="bkash" name="payment_type">
									  	<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<!-- info start -->
							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label> name</label>
                                    <input type="text" class="form-control" name="first_name" value="" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>last name</label>
										<input type="text" class="form-control" name="last_name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>email</label>
                                    <input type="email" class="form-control" name="email" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>phone</label>
										<input type="text" class="form-control" name="phone" value="">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>address</label>
										<input type="text" class="form-control" placeholder="street" name="address" value="" >
										{{-- <input type="text" class="form-control" placeholder="appartment, suite and etc" name=""> --}}
									</div>
								</div>
								
								<div class="col-md-12">
									<div class="form-group">
										<label>order note</label>
										<textarea class="form-control" rows="6" name="note"></textarea>
									</div>
								</div>
							</div>
							<!-- info end -->
							
							<!-- page change start -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group nextBtn text-right">
										<p class="prev-1 prev">previous step</p>
										<button class="submit" type="submit">Submit</button>
									</div>
								</div>
							</div>
							<!-- page change end -->
                            </form>
						</div>
						<!-- shipping details end -->
				  </div>
				</div>
			</div>
		</div>
		<!-- form item row end -->
	</div>
</section>



@endsection