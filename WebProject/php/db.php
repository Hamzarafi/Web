<?php
  session_start();
  $dsn = 'mysql:host=localhost;dbname=bms;charset=utf8mb4' ;
  $user = 'root' ;
  $pass = '' ;
  try {
      $db = new PDO($dsn, $user, $pass) ;
  } catch (Exception $ex) {
     echo '<p>DB Connect Error : ' . $ex->getMessage() . '</p>' ;
     exit;
  }

  $sql = "select name, title, url, note, created from bookmark b , user u where u.id = b.owner"
  $results = $db->query($sql)
  var_dump($results)