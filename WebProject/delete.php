<?php
  session_start() ;
  require_once 'php/db.php';

  if ( isset($_SESSION['cart'])) {
      foreach( $_SESSION['cart'] as $key => $item) {
          if( $item['id'] == $_GET['id']) {
              unset($_SESSION['cart'][$key]) ;
              break ;
          }
      }
   }
  
  header("Location: cart.php") ;
  ?>