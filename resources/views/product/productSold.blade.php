<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>List of Sold Products</h2>
	<a href="/home">Back to Home</a> | 
	<br/><br/>
	<div>
	<form method="post" action="/product/searchSoldproduct">
		<label>Search by Product Name:</label>
		<input type="text" name="searchText">
		<input type="submit" value="Search">
	</form>

	<form method="post" action="/product/searchByCatagorySoldproduct">
		<label>Search by Category:</label>
		<select name="cat">
				<option value="Men">Men</option>
				<option value="Women">Women</option>
				<option value="Food">Food</option>
				<option value="Electronics">Electronics</option>
		</select>
		<input type="submit" value="Search">
	</form>
</div>
	<br/>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>PRODUCT NAME</th>
			<th>USERNAME</th>
			<th>QUANTITY</th>
			<th>PRICE</th>
			<th>PHONE NUMBER</th>
			<th>ADDRESS</th>
			<th>ZIP CODE</th>
			<th>DELIVERY STATUS</th>
			<th>ORDER DATE</th>
		</tr>
		<?php 
		      $totalPrice = 0;
		      $totalQuantity= 0;           
		 ?>
		@foreach($soldproduct as $soldp)
			<tr>
				<td>{{$soldp->id}}</td>
				<td>{{$soldp->productname}}</td>
				<td>{{$soldp->username}}</td>
				<td>{{$soldp->quantity}}</td>
				<td>{{$soldp->price}}</td>
				<td>{{$soldp->phonenumber}}</td>
				<td>{{$soldp->address}}</td>
				<td>{{$soldp->zipcode}}</td>
				<td>{{$soldp->delivery}}</td>
				<td>{{$soldp->Orderdate}}</td>
				<?php 
		      		$totalPrice+=$soldp->price; 
		      		$totalQuantity+=$soldp->quantity;          
		 		?>
			</tr>
		@endforeach
		<tr>
			<th></th>
			<th></th>
			<th></th>
			<th>Total: {{$totalQuantity}}</th>
			<th>Total: {{$totalPrice}}</th>
			
		</tr>
	</table>
</body>
</html>