<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "ash";
$password = "ash";
$dbname = "driving_license";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the pass button is clicked
if(isset($_POST['pass'])){
    // Get the booking code from the form data
    $booking_code = $_POST['booking_code'];
    
    // Update the status of the booking to 'pass' in the 'license_booking' table
    $sql = "UPDATE license_booking SET status='pass' WHERE booking_code='$booking_code'";
    mysqli_query($conn, $sql);
    
    // Redirect the user to check_status.php with a 'pass' message
    // header("Location: check_status.php?message=Congratulation you are passed");
    // exit();
}

// Check if the fail button is clicked
if(isset($_POST['fail'])){
    // Get the booking code from the form data
    $booking_code = $_POST['booking_code'];
    
    // Update the status of the booking to 'fail' in the 'license_booking' table
    $sql = "UPDATE license_booking SET status='fail' WHERE booking_code='$booking_code'";
    mysqli_query($conn, $sql);
    
    // Redirect the user to check_status.php with a 'fail' message
    header("Location: check_status.php?message=sorry unfortunately you are failed");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" href="admin.css">
</head>
<body>
	<h1>Admin Page</h1>

	
	
	<?php
	// Retrieve all pending bookings from the 'license_booking' table
	$sql = "SELECT * FROM license_booking WHERE status='pending' ORDER BY booking_date ASC";
	$result = mysqli_query($conn, $sql);
	// $sql = "SELECT * FROM license_booking WHERE status='pending'";
	// $result = mysqli_query($conn, $sql);
	
	// Display a table of all pending bookings
	if(mysqli_num_rows($result) > 0) {
	    echo "<h2>Pending Bookings</h2>";
	    echo "<table>";
	    echo "<tr><th>Full Name</th><th>Email</th><th>Phone Number</th><th>Booking Date</th><th>Booking Time</th><th>Action</th></tr>";
	    while($row = mysqli_fetch_assoc($result)) {
	        echo "<tr>";
	        echo "<td>".$row['full_name']."</td>";
	        echo "<td>".$row['email']."</td>";
	        echo "<td>".$row['phone_number']."</td>";
			$sql = "SELECT * FROM license_booking WHERE status='pending' ORDER BY booking_time ASC";

	        echo "<td>".$row['booking_date']."</td>";
	        echo "<td>".$row['booking_time']."</td>";
	        echo "<td>
	                <form method='post' action='admin.php'>
	                    <input type='hidden' name='booking_code' value='".$row['booking_code']."' />
	                    <button type='submit' name='pass'>Pass</button>
	                    <button type='submit' name='fail'>Fail</button>
	                </form>
	              </td>";
	        echo "</tr>";
	    }
	    echo "</table>";
	} else {
	    echo "<h2>No Pending Bookings</h2>";
	}
	?>
	
</body>
</html>
