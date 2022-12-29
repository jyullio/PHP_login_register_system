<?php

    function database_create_connection()
    {

        $host = "localhost";
        $user = "root";
        $database = "login_system";
        $password = "";

        $dns = "mysql:host={$host};dbname={$database}";
        $pdo = new PDO($dns , $user , $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        return $pdo;

    }

    function database_select_by_name($user_name)
    {

        $pdo = database_create_connection();

        $data_placeholder = [
            "user_name" => $user_name,
        ];

        $stmt = $pdo -> prepare("SELECT * FROM users WHERE name = :user_name");
        $stmt -> execute($data_placeholder);
        $rows = $stmt -> fetch();

        return $rows;

    }

    function database_insert_user($user_name, $user_password)
    {

        $pdo = database_create_connection();

        $data_placeholder = [
            "user_name" => $user_name,
            "user_password" => $user_password,
        ];

        try
        {
            $stmt = $pdo -> prepare("INSERT INTO users (name , password) VALUES (:user_name,:user_password)");
            $stmt -> execute($data_placeholder);
        }
        catch(PDOException $e)
        {
            return false;
        }
        
        return true;

    }
    

?>


