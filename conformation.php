<!DOCTYPE html>
<html>
<head>
    <title>Driving License Booking Confirmation</title>
    <!-- Add your CSS styling here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        h1 {
            color: #003366;
            margin-top: 50px;
            text-align: center;
        }

        p {
            margin-top: 30px;
            font-size: 18px;
            line-height: 1.5;
        }

        .booking-code {
            font-size: 24px;
            font-weight: bold;
            color: #ff0000;
        }
    </style>
</head>
<body>
<h1>Thank you for your booking!</h1>

    <p>Your booking has been received and is currently pending. Your booking code is: <span class="booking-code"><?php echo $_GET['booking_code']; ?></span></p>
    <?php
    session_start();
    $_SESSION['code']=$_GET['booking_code'];
    ?>

    <p>We will review your booking and confirm your appointment within the next 24 hours. If you have any questions or concerns, please contact us using the information provided below.</p>

    <p><strong>Phone:</strong> 555-555-5555</p>

    <p><strong>Email:</strong> info@drivinglicensebooking.com</p>
    <button name="submit" onclick="window.location.href='checkresult.php'">Click Here</button>
</body>
</html>



