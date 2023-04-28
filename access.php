<?php
    try{
	//Use information specific to your DB.
	//Ensure that your username permissions are set up to read and write to DB
        $connection = "mysql:host=0.0.0.0; dbname=vinyl";
        $username="";
        $password="";

        $pdo = new pdo($connection, $username, $password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("Connection error:" .$e->getMessage());
    }
?>