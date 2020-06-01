<?php
    require_once "php/db.php";

    if (!(isset($_SESSION))){
        session_start();
    }
    
    extract($_SESSION);
    

    $cartTotal = 0;
    if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
        foreach( $_SESSION["cart"] as $item) {
            $cartTotal += $item['price'] ;
        }
    }
    
    if (isset($_SESSION["cart"]) ) {
        $cartqty = count($_SESSION["cart"]);
    }else {
        $cartqty = 0;
    }
    
    $currentPage = isset($_GET["page"]) ? $_GET["page"] : 1 ;

    $startIndex = ($currentPage - 1) * 4 ;
    $products = $db -> query ("select * from products limit $startIndex,4")->fetchAll(PDO::FETCH_ASSOC);
    
    $size = $db->query("select count(*) as num from products")->fetch()["num"] ;
    $totalPage = ceil( $size / 4 );
    
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
    <title>Shop Page- Ustora Demo</title>
    
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

    <script>
        function emptyOnClick(){
            document.getElementById("searchbox").setAttribute("value", "");
        }
    </script>

  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                        <li><a href="#"><i class="fa fa-user"></i><?= isset($_SESSION["user"]) ? "$user[0]": "Login" ?></a></li>
                            <li><a href="cart.php"><i class="fa fa-user"></i> My Cart</a></li>

                            <?php 
                                if(isset($_SESSION["user"])){
                                    echo "<li><a href='logout.php'><i class='fa fa-user'></i> Logout</a></li>";
                                }
                            ?>    
                        </ul>
                    </div>
                </div>
                
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
                
                <div class="col-sm-6">
                <div class="shopping-item">
                        <a href="cart.php">Cart - <span class="cart-amunt"> <?= $cartTotal ?> TL </span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?= $cartqty ?></span></a>
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
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="shop.php">Products</a></li>
                        <!-- <li><a href="single-product.html">Single product</a></li> -->
                        <li><a href="cart.php">Cart</a></li>
                        <!-- <li><a href="checkout.html">Checkout</a></li> -->
                        <li><a href="#">Category</a></li>
                        <!-- <li><a href="#">Others</a></li> -->
                        <!-- <li><a href="#">Contact</a></li> -->
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">

        <?php foreach($products as $product) : ?>
        <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="img/product-1.jpg" alt="">
                        </div>
                        <h2><a href="single-product.php?id=<?=$product["id"]?>"><?=$product["title"]?></a></h2>
                        <div class="product-carousel-price">
                            <p><?= $product["price"]?></p>
                        </div>  
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="add.php?page=<?= $currentPage ?>&id=<?=$product['id']?>">Add to cart</a>
                        </div>                       
                    </div>
                </div>
        <?php endforeach;?>
        
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                             <?php
                                if($currentPage == 1){
                                    
                                }
                                else{
                                echo "<a href='?page=".($currentPage - 1)."'aria-label='Previous'>
                                <span aria-hidden='true'>&laquo;</span>
                                </a>";}
                             ?>
                            </li>
                            <?php
                            for($i=1;$i<=$totalPage;$i++)
                            {
                                echo "<li><a href='?page=". $i ."'>$i</a></li>";
                            }
                            
                            ?>
                            <li>
                            <?php
                                if($currentPage == $totalPage){
                                   
                                }
                                else{
                                echo "<a href='?page=".($currentPage + 1)."' aria-label='Next'>
                                <span aria-hidden=2'true'>&raquo;</span>
                                </a>";}
                            ?>
                            </li>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>


        
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