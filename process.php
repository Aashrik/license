<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "ash";
$password = "ash";
$dbname = "driving_license";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $full_name = mysqli_real_escape_string($conn, $_POST["full_name"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
  $booking_date = mysqli_real_escape_string($conn, $_POST["booking_date"]);
  $booking_time = mysqli_real_escape_string($conn, $_POST["booking_time"]);
  
  // Validate the input data
  if (!empty($full_name) && !empty($email) && !empty($phone_number) && !empty($booking_date) && !empty($booking_time)) {
    // Generate a unique booking code
    $booking_code = uniqid();
    
    // Insert the booking details into the 'license_booking' table with a status of 'pending'
    $sql = "INSERT INTO license_booking (full_name, email, phone_number, booking_date, booking_time, booking_code, status)
            VALUES ('$full_name', '$email', '$phone_number', '$booking_date', '$booking_time', '$booking_code', 'pending')";
    mysqli_query($conn, $sql);
    
    // Redirect the user to a confirmation page with their booking code
    header("Location: conformation.php?booking_code=$booking_code");
    exit();
  }
}
?>
