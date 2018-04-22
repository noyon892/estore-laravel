<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	@include('partials.head')
</head>
<body id="checkout">
	<header>
		@include('partials.header')
	</header>
	<div class="container wrapper">
	            <div class="row cart-head">
	                <div class="container">
	                <div class="row">
	                    <p></p>
	                </div>
	                <div class="row">
	                    <div style="display: table; margin: auto;">
	                        <span class="step step_complete"> <a href="/cart" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
	                        <span class="step step_complete"> <a href="/checkout" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
	                        <span class="step_thankyou check-bc step_complete">Thank you</span>
	                    </div>
	                </div>
	                <div class="row">
	                    <p></p>
	                </div>
	                </div>
	            </div>    
	            <div class="row cart-body">
	                <form class="form-horizontal" method="post" action="">
	                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">

	                    <!--REVIEW ORDER-->
	                    <div class="panel panel-info">
	                        <div class="panel-heading">
	                            Review Order <div class="pull-right"><small><a class="afix-1" href="#">Edit Cart</a></small></div>
	                        </div>
	                        <div class="panel-body">

	                        	<?php
	                        		$subtotal=0;
	                        	?>
	                        	@foreach($cartproducts as $cp)
	                        		<div class="form-group">
	                        		    <div class="col-sm-3 col-xs-3">
	                        		        <img class="img-responsive" src="https://i.imgur.com/ruU04I6.jpg" />
	                        		    </div>
	                        		    <div class="col-sm-5 col-xs-5">
	                        		        <input type="hidden" name="productid" value="{{$cp->id}}">
	                        		        <input type="hidden" name="quantity" value="{{$cp->qty}}">
	                        		        <input type="hidden" name="productname" value="{{$cp->productname}}">
	                        		        <div class="col-xs-12"><strong>{{$cp->productname}}</strong></div>
	                        		        <div class="col-xs-12"><small><strong>Quantity:<span> {{$cp->qty}}</span></strong></small></div>
	                        		    </div>
	                        		    <div class="col-sm-3 col-xs-3 text-right">
	                        		    	<input type="hidden" name="price" value="{{$cp->price}}">
	                        		        <h5><span>BDT</span> {{$cp->subtotal}}</h5>
	                        		    </div>
	                        		    <div class="col-sm-1 col-xs-1 text-right">
	                        		        <h6><a href="/cart/removefromcart/{{$cp->rowId}}"><i class="glyphicon glyphicon-remove"></i></a></h6>
	                        		    </div>
	                        		</div>
                        			<?php
                        				$subtotal+=$cp->subtotal
                        			?>
	                        		@endforeach                       	                        
	                            <div class="form-group"><hr /></div>
	                            <div class="form-group">
	                                <div class="col-xs-12">
	                                    <strong>Subtotal</strong>
	                                    <div class="pull-right"><span>BDT</span><span> {{$subtotal}}</span></div>
	                                </div>
	                                <div class="col-xs-12">
	                                	<?php
	                                		$vat=($subtotal*2)/100;
	                                	?>
	                                    <strong>Vat (2%)</strong>
	                                    <div class="pull-right"><span>BDT</span><span> {{$vat}}</span></div>
	                                </div>
	                                <div class="col-xs-12">
	                                    <small>Shipping</small>
	                                    <div class="pull-right"><span>BDT</span><span> 50</span></div>
	                                </div>
	                            </div>
	                            <div class="form-group"><hr /></div>
	                            <div class="form-group">
	                                <div class="col-xs-12">
	                                    <strong>Order Total</strong>
	                                    <div class="pull-right"><span>BDT</span><span> {{$subtotal+$vat+50}}</span></div>
	                                    <input type="hidden" name="totalprice" value="{{$subtotal+$vat+50}}">
	                                </div>
	                            </div>
	                        </div>
	                    </div>


	                    <!--REVIEW ORDER END-->
	                </div>
	                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
	                    <!--SHIPPING METHOD-->
	                    <div class="panel panel-info">
	                        <div class="panel-heading">Address</div>
	                        <div class="panel-body">
	                            <div class="form-group">
	                                <div class="col-md-12">
	                                    <h4>Shipping Address</h4>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12 col-xs-12">
	                                    <strong>Full Name:</strong>
	                                    <input type="text" name="first_name" class="form-control" value="{{$user->name}}" />
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12"><strong>Address:</strong></div>
	                                <div class="col-md-12">
	                                    <input type="text" name="address" class="form-control" value="{{$user->address}}" />
	                                </div>
	                            </div>
<!-- 	                            <div class="form-group">
	                                <div class="col-md-12"><strong>City:</strong></div>
	                                <div class="col-md-12">
	                                    <input type="text" name="city" class="form-control" value="" />
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12"><strong>State:</strong></div>
	                                <div class="col-md-12">
	                                    <input type="text" name="state" class="form-control" value="" />
	                                </div>
	                            </div> -->
	                            <div class="form-group">
	                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
	                                <div class="col-md-12">
	                                    <input type="text" name="zip_code" class="form-control" value="1229" />
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12"><strong>Phone Number:</strong></div>
	                                <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="{{$user->phone}}" /></div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12"><strong>Email Address:</strong></div>
	                                <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="{{$user->email}}" /></div>
	                            </div>
	                        </div>
	                    </div>
	                    <!--SHIPPING METHOD END-->
	                    <!--CREDIT CART PAYMENT-->
	                    <div class="panel panel-info">
	                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
	                        <div class="panel-body">
	                            <div class="form-group">
	                                <div class="col-md-12"><strong>Card Type:</strong></div>
	                                <div class="col-md-12">
	                                    <select id="CreditCardType" name="CreditCardType" class="form-control">
	                                        <option value="5">Visa</option>
	                                        <option value="6">MasterCard</option>
	                                        <option value="7">American Express</option>
	                                        <option value="8">Discover</option>
	                                    </select>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12"><strong>Credit Card Number:</strong></div>
	                                <div class="col-md-12"><input type="text" class="form-control" name="car_number" value="" /></div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12"><strong>Card CVV:</strong></div>
	                                <div class="col-md-12"><input type="text" class="form-control" name="car_code" value="" /></div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12">
	                                    <strong>Expiration Date</strong>
	                                </div>
	                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                                    <select class="form-control" name="month">
	                                        <option value="">Month</option>
	                                        <option value="01">01</option>
	                                        <option value="02">02</option>
	                                        <option value="03">03</option>
	                                        <option value="04">04</option>
	                                        <option value="05">05</option>
	                                        <option value="06">06</option>
	                                        <option value="07">07</option>
	                                        <option value="08">08</option>
	                                        <option value="09">09</option>
	                                        <option value="10">10</option>
	                                        <option value="11">11</option>
	                                        <option value="12">12</option>
	                                </select>
	                                </div>
	                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                                    <select class="form-control" name="year">
	                                        <option value="">Year</option>
	                                        <option value="2018">2018</option>
	                                        <option value="2019">2019</option>
	                                        <option value="2020">2020</option>
	                                        <option value="2021">2021</option>
	                                        <option value="2022">2022</option>
	                                        <option value="2023">2023</option>
	                                        <option value="2024">2024</option>
	                                        <option value="2025">2025</option>
	                                        <option value="2025">2026</option>
	                                        <option value="2025">2027</option>
	                                        <option value="2025">2028</option>
	                                </select>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12">
	                                    <span>Pay secure using your credit card.</span>
	                                </div>
	                                <div class="col-md-12">
	                                    <ul class="cards">
	                                        <li class="visa hand">Visa</li>
	                                        <li class="mastercard hand">MasterCard</li>
	                                        <li class="amex hand">Amex</li>
	                                    </ul>
	                                    <div class="clearfix"></div>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-6 col-sm-6 col-xs-12">
	                                    <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <!--CREDIT CART PAYMENT END-->
	                </div>
	                
	                </form>
	            </div>
	            <div class="row cart-footer">
	        
	            </div>
	    </div>
	<hr>
	<footer class="bg-dark text-white">
	@include('partials.footer')
	</footer>
</body>
</html>