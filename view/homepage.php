<?php
    session_start();
    if(!isset($_SESSION["user_name_logged"]))
    {
        header("location: login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <title>My app</title>
</head>
<body>

    <header>
        <nav>

            <div class="navbar">
                <a href="about_us.php">About us</a>
                <a href="contact.php">Contact</a>
                <a href="../controllers/logout.php">Logout</a>
            </div>

        </nav>
    </header>

    <main>
        <h1>My app</h1>
    </main> 


</body>
</html>