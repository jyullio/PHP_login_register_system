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
                <a href="login.php">Login</a>
            </div>

        </nav>

    </header>    

    <main>

        <?php
            
            if(isset($_SESSION["flash_error_msg"])){
                echo '<p class="flash_error_msg">' . $_SESSION["flash_error_msg"] . '</p>';
                unset($_SESSION["flash_error_msg"]);
            }
            
        ?>

        <h2>Signup</h2>

        <form action="../controllers/signup.php" method="POST">

            
            <label for="user_name">Name:</label>
            <input type="text" name="user_name" id="user_name" placeholder="Name" maxlength="100">
                
            <label for="password">Password</label>
            <input type="password" name="user_password" id="password" placeholder="Password" maxlength="100">
        
            <label for="confirm_password">Confirm password</label>
            <input type="password" name="user_confirm_password" id="confirm_password" placeholder="Confirm password" maxlength="100">
        
            <button type="submit" name="signup">Signup</button>
            
            

        </form>
        
    </main>

</body>
</html>