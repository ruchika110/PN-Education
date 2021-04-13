@extends('front.master')

@section("title",'Checkout | PN Infosys Edu.')

@section('content')

<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Checkout</h1>
				<ul class="page-depth">
					<li><a href="index.html">Studiare</a></li>
					<li><a href="checkout.html">Checkout</a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- cart-section 
			================================================== -->
		<section class="cart-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="cart-box">
							<h2>Billing details</h2>
							<form class="billing-details" method="post" action="{{url('front/checkout/insert_order')}}">
								@csrf

								<div class="row">
									<div class="col-lg-6">
										<label for="first-name">Name*</label>
										<input type="text" id="first-name" name="name" value="{{Auth::user()->name}}" />
									</div>
									<div class="col-lg-6">
										
									</div>
								</div>
								<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
								
								
								<label for="country">Country*</label>
								<select id="country" name="country">
									<option>Country...</option>
									<option>Albania</option>
									<option>USA</option>
									<option>Canada</option>
									<option>Brazil</option>
									<option>Germany</option>
									<option>England</option>
									<option>France</option>
									<option>Italy</option>
									<option>Australia</option>
								</select>
								<label for="street-name">Street address *</label>
								<input type="text" name="address" id="street-name" placeholder="House number and street name" />
								<label for="city-name">Town / City*</label>
								<input type="text" name="city" id="city-name" />
								<label for="state-name">State / Country*</label>
								<input type="text" name="state" id="state-name" />
								<label for="postcode-name">Postcode / Zip*</label>
								<input type="text" name="pincode" id="postcode-name" />
								<label for="phone-name">Phone*</label>
								<input type="text" name="phone" id="phone-name" />
								<label for="email-address">Email Address*</label>
								<input type="text" name="user_email" id="email-address" value="{{Auth::user()->email}}" />
								<h2>Additional information</h2>
								<label for="notes">Order notes (optional)</label>
								<textarea id="notes" name="order_note" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
							
						</div>
					</div>
					<div class="col-lg-4">
						<div class="sidebar">
							<div class="widget cart-widget">
								<h2>Your order</h2>
								<table>
									<tbody>
										<tr>
											<td>Product</td>
											<td>Total</td>
										</tr>

										<?php $total_amount=0; ?>

									    @foreach($cart as $c)
									    <?php  
                                        $total_amount=$total_amount+($c->course_price*$c->course_quantity);
									    ?>
										<tr>
											<td class="name-pro">{{$c->course_name}}  × {{$c->course_quantity}}</td>
											<td>₹{{$c->course_price}}</td>
										</tr>
							            @endforeach

										<tr class="order-total">
											<th>Subtotal</th>
											<td>₹<?php echo $total_amount; ?></td>
										</tr>
										<tr class="order-total">
											<th>Total</th>
											<td class="total-price">₹<?php echo$total_amount; ?></td>
										</tr>
									</tbody>
								</table>
								<input type="submit" name="submit" value="proceed to complete" class="btn" style="background-color:orange;width:330px;border-radius: 35px;margin-bottom:10px;padding: 10px;"></input>
								

							</div>
						</div>
					</div>
				</div>
				</form>
			</div>
		</section>
		<!-- End cart section -->

@endsection