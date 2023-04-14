<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="checkresult.css">
</head>
<body>
    
    <form action="check_status.php" method="post">
        <?php
        session_start();
        $code = "";
        if(isset($_SESSION['code'])) {
            $code = $_SESSION['code'];
        }
        ?>
    
    <label for="text">Code:</label><br>
    <input type="text" name="Code" id="code" value="<?php echo $code; ?>"><br>
    <button type="submit">Submit Now</button>
    </form>
</body>
</html>
