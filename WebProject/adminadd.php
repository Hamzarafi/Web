<?php
    require "./php/db.php";

    //var_dump($_POST);

    if ( isset($_POST["id"])) {
        extract($_POST);

        
        if ( strlen(trim($id)) !== 0 ) {
        // First check the existence of the current id
        $stmt = $db->prepare("select count(*) as num from products where id = ?");
        $stmt->execute([$id]);
        $num = (int) $stmt->fetch()["num"];

            // No duplicate actions.
            if ( $num == 0) {
                $cat = filter_var($cat, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $brand = filter_var($brand, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $title = filter_var($title, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $prop = filter_var($prop, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if (isset($promotional)){
                    $pro = "yes"; 
                }else{
                    $pro="no";
                }

                 //$sql = "insert into products values ( :id, '$cat', '$brand', '$title', '$price', '$prop', '$rate', '$pro')" ;
                 //$stmt = $db->query($sql) ;
                 //$stmt->bindValue("id", $_POST["id"]) ;
                 //$stmt->execute(); 
                
                $temp = array($id, $cat, $brand, $title, $price, $prop, $rate, $pro);

                 
                $stmt = $db->prepare("insert into products values (?,?,?,?,?,?,?,?)");
                $stmt->execute($temp) ;
                

            }  else {
                $incorrectId_error = true ;
            }
        } else {
            $noid_error = true ;
      }
    }
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

    <style>
        .maincontent-area {
            text-align: center;
            position: relative;
        }
        table {
            text-align: center;
        }
    </style>
    
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
    <p>Enter information to enter:</p>
    <form action="" method="POST">
        <table id='addtable'>
        <tr>
            <td>ID</td>
            <td><input type="text" name="id" id=""></td>
        </tr>
        <tr>
            <td>Category</td>
            <td><input type="text" name="cat" id=""></td>
        </tr>
        <tr>
            <td>Brand</td>    
            <td><input type="text" name="brand" id=""></td>
        </tr>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" id=""></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="number" name="price" id=""></td>
        </tr>
        <tr>
            <td>Properties</td>    
            <td><input type="text" name="prop" id=""></td>
        </tr>
        <tr>
            <td>Rating</td>
            <td><input type="number" name="rate" id=""></td>
        </tr>
        <tr>
            <td>Promotional</td>
            <td><input type="checkbox" name="promotional" id=""></td>
        </tr>
        <tr>
            <td colspan='8'><input type="submit" value="add"> </td>
        </tr>
        </table>
        </form>


        <?php if ( isset($_POST["add"]) && !(isset($incorrectId_error)) && !(isset($noid_error))) : ?>
        <div class="">
            <h1 class="">Item Added</h1>
        </div>
        <?php endif; ?>


        <?php if ( isset($incorrectId_error)) : ?>
        <div class="">
            <h1 class="">ID ALREADY EXISTS!</h1>
        </div>
        <?php endif; ?>



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