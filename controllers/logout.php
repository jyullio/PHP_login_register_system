<?php

    session_start();

    if(isset($_SESSION["user_name_logged"]))
    {
        unset($_SESSION["user_name_logged"]);
        header("location: ../view/login.php");
        exit();
    }
    else
    {
        die("Something went wrong!!!");
    }

?>