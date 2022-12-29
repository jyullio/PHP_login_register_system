<?php

    session_start();
    require("../model/database.php");

    
    if(isset($_POST["login"]))
    {
        //check if the username has no special characters
        if(preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/" , $_POST["user_name"]))
        {
            $_SESSION["flash_error_msg"] = "User name can't have special characters!!!";
            header("location: ../view/login.php");
            exit();
        }

        //check for any empty field
        if(empty($_POST["user_name"]) || empty($_POST["user_password"]))
        {
            $_SESSION["flash_error_msg"] = "All fields must be filled!!!";
            header("location: ../view/login.php");
            exit();
        }

        //user login
        $selected_rows = database_select_by_name($_POST["user_name"]);
        if($selected_rows)
        {
            $hashed_password = $selected_rows["password"];
            if(password_verify($_POST["user_password"], $hashed_password))
            {
                $_SESSION["user_name_logged"] = $_POST["user_name"];
                header("location: ../view/homepage.php");
                exit();
            }
            else
            {
                $_SESSION["flash_error_msg"] = "Password incorrect!!!";
                header("location: ../view/login.php");
                exit();
            }
        }
        else
        {
            $_SESSION["flash_error_msg"] = "User dont found!!!";
            header("location: ../view/login.php");
            exit();
        }
        
    }
    else
    {
        die("Something went wrong!!!"); //tried access this .php file with GET method
    }



?>