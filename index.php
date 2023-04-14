<!DOCTYPE html>
<html>
<head>
	<title>Driving License Booking System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Driving License Booking System</h1>
		<form action="process.php" method="post">
			<label for="full_name">Full Name</label>
			<input type="text" name="full_name" id="full_name" required>
			<label for="email">Email</label>
			<input type="email" name="email" id="email" required>
			<label for="phone_number">Phone Number</label>
			<input type="tel" name="phone_number" id="phone_number" required>
			<label for="booking_date">Booking Date</label>
			<input type="date" name="booking_date" id="booking_date" required>
			<label for="booking_time">Booking Time</label>
			<input type="time" name="booking_time" id="booking_time" required>
			<input type="submit" value="Book Now" >
			
		</form>
	</div>
</body>
</html>
