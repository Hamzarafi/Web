<?php
    require_once "php/db.php";

    extract($_SESSION);

    if ( isset($_POST["idrem"])){
        $stmt = $db->prepare("update products set promotional = 'no' where id = ?") ;
        $stmt->execute([$_POST["idrem"]]) ;
    }
    if ( isset($_POST["idadd"])){
        $stmt = $db->prepare("update products set promotional = 'yes' where id = ?") ;
        $stmt->execute([$_POST["idadd"]]) ;
    }

    $yes = $db -> query ("select * from products where promotional = 'yes'")->fetchAll(PDO::FETCH_ASSOC);
    $no = $db -> query ("select * from products where promotional = 'no'")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ustora Demo</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="jquery.js"></script>
    <script>
        function emptyOnClick(){
            document.getElementById("searchbox").setAttribute("value", "");
        }
    </script>
    <style>
        table {
            text-align: center;
        }
    </style>
  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> Logout</a></li>
                            <!-- <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li> -->
                            <!-- <li><a href="login.html"><i class="fa fa-user"></i> Login</a></li> -->
                        </ul>
                    </div>
                </div>

                <!-- Search box and button -->
                <div class="col-md-4">
                   <form action="" method="POST">
                        <input type="text" name="searchbox" id="searchbox" onClick="emptyOnClick();" value="Sample Text">
                        <input type="button" value="Search">
                   </form>
                </div>


            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="img/logo.png"></a></h1>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="shop.html">Products</a></li>
                        <!-- <li><a href="single-product.html">Single product</a></li> -->
                        <!-- <li><a href="cart.html">Cart</a></li> -->
                        <!-- <li><a href="checkout.html">Checkout</a></li> -->
                        <li><a href="#">Categories</a></li>
                        <!-- <li><a href="#">Others</a></li> -->
                        <!-- <li><a href="#">Contact</a></li> -->
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    

    <div class="maincontent-area">
    <form action="" method="POST">    
    <table>
                <th colspan='2'>
                    <h1>Selected items for the slider</h1>
                </th>
                <?php foreach($yes as $product) : ?>
                    <tr>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <td><p>ID =<?= $product["id"]?></p></td>
                            <td><h2><?=$product["title"]?></h2></td>
                        </div>                    
                    </div>
                    </tr>
                    <?php endforeach;?>
                    <tr>
                        <td>ID to Remove</td>
                        <td><input type="text" name="idrem" id=""></td>
                        <td><input type="submit" value="remove"> </td>
                    </tr>

    </table>
    <table>
                <th colspan='2'>
                    <h1>Items that can be selected for slider</h1>
                </th>
                
                <?php foreach($no as $product) : ?>
                    <tr>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <td><p>ID = <?= $product["id"]?></p></td>
                            <td><h2><?=$product["title"]?></h2></td>
                        </div>                    
                    </div>
                    </tr>
                    <?php endforeach;?>
                    <tr>
                        <td>ID to ADD</td>
                        <td><input type="text" name="idadd" id=""></td>
                        <td><input type="submit" value="add"> </td>
                    </tr>
        </table>
        </form>







    </div> <!-- End main content area -->
    

    
    
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="footer-about-us">
                        <h2>u<span>Stora</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Order history</a></li>
                            <!-- <li><a href="#">Wishlist</a></li> -->
                            <!-- <li><a href="#">Vendor contact</a></li> -->
                            <!-- <li><a href="#">Front page</a></li> -->
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="#">Mobile Phone</a></li>
                            <!-- <li><a href="#">Home accesseries</a></li> -->
                            <li><a href="#">TV</a></li>
                            <li><a href="#">Computer</a></li>
                            <!-- <li><a href="#">Gadets</a></li> -->
                        </ul>                        
                    </div>
                </div>
                
                
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; All Rights Reserved. </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>
  </body>
</html>