<?php
$servername = "localhost";
$username = "ash";
$password = "ash";
$dbname = "driving_license";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//update booking status in database
$booking_code = $_POST["booking_code"];
$status = $_POST["status"];
$sql = "UPDATE license_booking SET status='$status' WHERE booking_code='$booking_code'";
if ($conn->query($sql) === TRUE) {
    //get user email from database
    $email = $_POST["email"];
    $full_name = $_POST["full_name"];

    //send email to user
    $to = $email;
    $subject = "Driving Test Result";
    $message = "Dear ".$full_name.",\n\nYour driving test result is: ".$status;
    $headers = "From: admin@drivingtest.com";
    mail($to, $subject, $message, $headers);

    //redirect to admin page
    header("Location: admin.php");
} else {
    echo "Error updating record: " . $conn->error;
}

//close database connection
$conn->close();
?>