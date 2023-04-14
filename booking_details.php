
<?php
$servername = "localhost";
$username = "ash";
$password = "ash";
$dbname = "driving_license";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//get booking details from database
$booking_code = $_GET["booking_code"];
$sql = "SELECT * FROM license_booking WHERE booking_code='$booking_code'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//display booking details
echo "<h1>Booking Details</h1>";
echo "<table>";
echo "<tr><th>Full Name</th><td>".$row["full_name"]."</td></tr>";
echo "<tr><th>Email</th><td>".$row["email"]."</td></tr>";
echo "<tr><th>Phone Number</th><td>".$row["phone_number"]."</td></tr>";
echo "<tr><th>Booking Date</th><td>".$row["booking_date"]."</td></tr>";
echo "<tr><th>Booking Time</th><td>".$row["booking_time"]."</td></tr>";
echo "<tr><th>Booking Code</th><td>".$row["booking_code"]."</td></tr>";
echo "</table>";
#header("Location: update.php?booking_code=$booking_code");

//close database connection
$conn->close();
?>