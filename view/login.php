<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="app.css">
    

</head>
<body>
    
    <header>
        <nav>

            <div class="navbar">
                <a href="signup.php">Signup</a>
            </div>

        </nav>

    </header>

    <main>
        
        <?php
            
            if(isset($_SESSION["flash_error_msg"])){
                echo '<p class="flash_error_msg">' . $_SESSION["flash_error_msg"] . '</p>';
                unset($_SESSION["flash_error_msg"]);
            }

            if(isset($_SESSION["flash_success_msg"])){
                echo '<p class="flash_success_msg">' . $_SESSION["flash_success_msg"] . '</p>';
                unset($_SESSION["flash_success_msg"]);
            }
            
        ?>

        <h2>Login</h2>

        <form action="../controllers/login.php" method="POST">

            
            <label for="user_name">Name:</label>
            <input type="text" name="user_name" id="user_name" placeholder="Name" maxlength="100">
                
            <label for="password">Password:</label>
            <input type="password" name="user_password" id="password" placeholder="Password" maxlength="100">
        
            <button type="submit" name="login">Login</button>
            
            

        </form>
        
    </main>

</body>
</html>