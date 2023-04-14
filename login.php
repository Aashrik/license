<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="check.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email"><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br>
        <?php
            if(isset($_GET['error']) && $_GET['error'] == "invalid_credentials"){
                echo "<p style='color:red;'>Invalid email or password. Please try again.</p>";
            }
        ?>
        <input type="submit" value="Submit Now">
    </form>
</body>
</html>