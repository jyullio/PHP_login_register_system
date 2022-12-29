<?php

    session_start();
    require("../model/database.php");

    
    if(isset($_POST["signup"]))
    {
        //check if the username has no special characters
        if(preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/" , $_POST["user_name"]))
        {
            $_SESSION["flash_error_msg"] = "User name can't have special characters!!!";
            header("location: ../view/signup.php");
            exit();
        }

        //check for any empty field
        if(empty($_POST["user_name"]) || empty($_POST["user_password"]) || empty($_POST["user_confirm_password"]))
        {
            $_SESSION["flash_error_msg"] = "All fields must be filled!!!";
            header("location: ../view/signup.php");
            exit();
        }

        //make sure the passwords are the same
        if($_POST["user_confirm_password"] !== $_POST["user_password"]){

            $_SESSION["flash_error_msg"] = "Passwords dont match!!!";
            header("location: ../view/signup.php");
            exit();
        }

        //check if the user is already registered
        $selected_rows = database_select_by_name($_POST["user_name"]);
        if($selected_rows)
        {
            $_SESSION["flash_error_msg"] = "User already registered!!!";
            header("location: ../view/signup.php");
            exit();
        }

        //signup user
        $hashed_user_password = password_hash($_POST["user_password"] , PASSWORD_DEFAULT);
        if(database_insert_user($_POST["user_name"] , $hashed_user_password))
        {
            $_SESSION["flash_success_msg"] = "Success on register";
            header("location: ../view/login.php");
            exit();
        }
        else
        {
            $_SESSION["flash_error_msg"] = "Something went wrong!!!";
            header("location: ../view/signup.php");
            exit();

        }
        
    }
    else
    {
        die("Something went wrong!!!"); //tried access this .php file with GET method
    }



?>