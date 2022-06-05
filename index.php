<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS library -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>U08B</title>
	<!--
	Livingston Vincent U08B
		What objectives are you demonstrating?
	-Demonstrate common Web form properties, methods and elements
	-Demonstrate how data is transmitted from the client to the server and back again
	-Demonstrate the difference between POST and GET methods on transmitting data
	-Demonstrate common PHP operators, conditional statements, and loops
	-Demonstrate a simple client/server event with PHP and a Web page
	-->
</head>
<body>
 	
 	<?php
 		// define prices
 		$small_pizza = 20;
 		$medium_pizza = 35;
 		$large_pizza = 60;

 		$pepperoni = 5;
 		$sausage = 10;
 		$cheese = 7;
 		$bacon = 8;
 	?>

 	<!-- container for title -->
 	<div class="container">
 		<!-- create row -->
 		<div class="row">
 			<!-- around 40% screen width -->
 			<div class="col-sm-5">
 				<!-- main pizza picture -->
 				<img src="https://images.pexels.com/photos/1260968/pexels-photo-1260968.jpeg" class="img-fluid" alt="pizza">
 			</div>
 			<!-- around 60% screen width -->
 			<div class="col-sm-7">
 				<!-- main page title -->
 				<h1 class="text-center">Order a Pizza</h1>
		 		<!-- create row with grey section -->
		 		<div class="row section">
		 			<!-- full width -->
		 			<div class="col-sm-12">
		 				<?php
		 					// check if form is submitted via POST method
		 					if(isset($_POST['submit'])){
		 							
	 							// default total variable
	 							$total = 0;

	 							// take pizza size via post
	 							if (isset($_POST['size'])) {
	 								$pizza_size = $_POST['size'];

	 								// get pizza price based on pizza size
	 								if($pizza_size == 'small'){
	 									$pizza_price = $small_pizza;
	 								}
	 								else if($pizza_size == 'medium'){
	 									$pizza_price = $medium_pizza;
	 								}
	 								else if($pizza_size == 'large'){
	 									$pizza_price = $large_pizza;
	 								}

	 								// set pizza price
	 								$total = $pizza_price;

		 							// generate table row
		 							$pizza_row = '
			 							<tr>
			 								<th colspan="2">Pizza</th>
			 							</tr>
			 							<tr> 
			 								<td width="50%">'.$pizza_size.'</td> <td>$'.$pizza_price.'</td>
			 							</tr>';
	 							}
	 							
	 							// check if topping is selected
	 							$topping_row = '';
	 							if (isset($_POST['topping'])) {
	 								$topping_row .= '
			 							<tr>
			 								<th colspan="2">Toppings</th>
			 							</tr>';
	 								// take all selected toppings
		 							foreach ($_POST['topping'] as $topping) {

		 								// get topping price based on selected topping
		 								if($topping == 'pepperoni'){
		 									$topping_price = $pepperoni;
		 								}
		 								else if($topping == 'sausage'){
		 									$topping_price = $sausage;
		 								}
		 								else if($topping == 'cheese'){
		 									$topping_price = $cheese;
		 								}
		 								else if($topping == 'bacon'){
		 									$topping_price = $bacon;
		 								}

		 								// recurrsive sum of toppings
		 								$total = $total + $topping_price;

		 								$topping_row .= '
		 							        <tr> 
		 							        	<td>'.$topping.'</td> <td>$'.$topping_price.'</td>
				 							</tr>';
	 							    }
	 							}

	 							// create row for total bill
	 							$total_bill = '
 							        <tr> 
		 								<td class="total">Total Bill</td> <td class="total">$'.$total.'</td>
		 							</tr>';

		 						// create order history with bill and append all above created rows
		 							echo '
		 							<h4 class="text-center">Order Summary</h4><br/>

		 							<!-- use date() function to get current date -->
		 							<p>Order date: '.date('d-m-Y').'</p>

		 							<!-- create table -->
		 							<table class="table table-bordered">
		 								'.$pizza_row.$topping_row.$total_bill.'
		 							</table>
		 							<p class="text-center"><em>Thank you for your order</em></p>

		 							<!-- back button -->
		 							<a class="btn btn-primary" href="">Go back</a>';
		 					}
		 					else {
		 				?>
		 				<!-- create a form with GET method -->
		 				<form method="POST" action="">
		 					<!-- pizza size -->
		 					<p class="text-strong">Please select pizza size:</p>
		 					<div class="form-group">
		 					    <div class="custom-control custom-radio">
		 					    	<!-- radio for small pizza -->
									<input type="radio" id="small" value="small" name="size" class="custom-control-input" checked />
									<label class="custom-control-label" for="small">Small ($<?php echo $small_pizza;?>)</label>
		 					    </div>
		 					    <div class="custom-control custom-radio">
		 					    	<!-- radio for medium pizza -->
									<input type="radio" id="medium" value="medium" name="size" class="custom-control-input" />
									<label class="custom-control-label" for="medium">Medium ($<?php echo $medium_pizza;?>)</label>
		 					    </div>
		 					    <div class="custom-control custom-radio">
		 					    	<!-- radio for large pizza -->
									<input type="radio" id="large" value="large" name="size" class="custom-control-input" />
									<label class="custom-control-label" for="large">Large ($<?php echo $large_pizza;?>)</label>
		 					    </div>
		 					</div>

		 					<!-- topping -->
		 					<p class="text-strong">Please select preferred topping:</p>
		 					<div class="form-group">
		 					    <div class="custom-control custom-checkbox">
		 					    	<!-- checkbox for pepperoni topping -->
									<input type="checkbox" id="pepperoni" value="pepperoni" name="topping[]" class="custom-control-input" />
									<label class="custom-control-label" for="pepperoni">Pepperoni ($<?php echo $pepperoni;?>)</label>
		 					    </div>
		 					    <div class="custom-control custom-checkbox">
		 					    	<!-- checkbox for sausage topping -->
									<input type="checkbox" id="sausage" value="sausage" name="topping[]" class="custom-control-input" />
									<label class="custom-control-label" for="sausage">Sausage ($<?php echo $sausage;?>)</label>
		 					    </div>
		 					    <div class="custom-control custom-checkbox">
		 					    	<!-- checkbox for extra cheese topping -->
									<input type="checkbox" id="cheese" value="cheese" name="topping[]" class="custom-control-input" />
									<label class="custom-control-label" for="cheese">Extra Cheese ($<?php echo $cheese;?>)</label>
		 					    </div>
		 					    <div class="custom-control custom-checkbox">
		 					    	<!-- checkbox for bacon topping -->
									<input type="checkbox" id="bacon" value="bacon" name="topping[]" class="custom-control-input" />
									<label class="custom-control-label" for="bacon">Bacon ($<?php echo $bacon;?>)</label>
		 					    </div>
		 					</div>
		 					<!-- submit button, to submit form data for processing -->
		 					<button type="submit" name="submit" class="btn btn-primary">Place Order</button>
		 				</form>
		 				<?php
		 					} // end else
		 				?>
		 			</div>

		 		</div>
 			</div>
 		</div>
 	</div>

	<!-- jQuery and Bootstrap JS libraries -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
