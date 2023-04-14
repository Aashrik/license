<?php
    $host = "localhost";
    $username = "ash";
    $password = "ash";
    $database = "driving_license";
    $connection = mysqli_connect($host, $username, $password, $database);
    if (!$connection) {
        echo "Failed";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connection, $query);    
        if (mysqli_num_rows($result) == 1) {
            $each = mysqli_fetch_assoc($result);
            header("Location: admin.php");
            exit; // This line is important to prevent the code below from executing
        } else {
            header("Location: login.php?error=invalid_credentials");
            exit;
        }
    }
?>
