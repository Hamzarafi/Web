<?php

    require_once "db.php";

    var_dump($_POST);
    extract($_POST);

    $error = false;

    $email = filter_var($email, FILTER_SANITIZE_STRING);

    if( filter_var($email, FILTER_VALIDATE_EMAIL) === false){
       $error = true;
    }

    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    if( strlen(trim($pass)) === 0){
        $error = true;
    }

    if(!$error){
        $sql = "select * from users where email = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);
        $rows = $stmt->fetchAll();

        if($rows[0]["password"] == $pass){
            session_start();
            $_SESSION["user"] = [$rows[0]["name"], $rows[0]["email"]];
            header("Location:../index.php");
        }else{
            $error = true;
        }
    }
    if($error){

        header("Location:../login.php?error=true&email=$email");

    }

    // session TODO