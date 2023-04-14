<?php
     $booking_code = $_POST["Code"];
    $con = mysqli_connect("localhost", "ash", "ash", "driving_license");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM license_booking WHERE booking_code='$booking_code'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $status = $row["status"];
        if ($status == "pass") {
            echo "You are passed";
        } else if ($status == "fail") {
            echo "You are failed";
        } else if ($status == "pending") {
          echo "You status is pending ";
      }
        else {
            echo "Status unknown";
        }
    } else {
        echo "Invalid booking code.";
    }
    mysqli_close($con);
?>

