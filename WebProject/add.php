<?php
    require_once "php/db.php";
    if (!(isset($_SESSION))){
        session_start();
    }


    $stmt = $db->prepare("select * from products where id = ?") ;
    $stmt->execute([$_GET["id"]]) ;



    if ( !isset($_SESSION["cart"])) $_SESSION["cart"] = [] ;

    array_push($_SESSION["cart"], $stmt->fetch() ) ;
    
    header("Location: shop.php?page={$_GET['page']}") ;

?>