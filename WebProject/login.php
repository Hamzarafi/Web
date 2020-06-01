<?php

    $error = false;

    if(isset($_GET["error"])){
        $error = true;
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
  </head>
  <body>
   
    
    
    <div class="site-branding-area">
        <div class="container" style="text-align: center;">
            <div class="row" style="text-align: center;">
                <div>
                    <div class="logo">
                        <h1><a href="./"><img src="img/logo.png"></a></h1>
                    </div>
                </div>
                
                <!-- <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.html">Cart - <span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div> -->
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    
    <div>

        <h1 style="text-align: center;">Login</h1>

    </div>
    
   
    
    <div class="maincontent-area">
        <form action="php/checklogin.php" method="post">

<div style="text-align: center;">
		<div >
			<div >
				<form >
                    <?php

                        if($error){
                            echo "<div style='color:red; text-align:center'>
                                <p>Email or Password is invalid</p>
                            </div>";
                        }
                        
                    ?>
					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Email
						</span>
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="email" id="emailtxt" <?= isset($_GET["email"]) ? "value = {$_GET['email']}" : "" ;?>>
						<span class="focus-input100"></span>
					</div>
                </br>
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>
                    </div>
                
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" id="passtxt">
						<span class="focus-input100"></span>
					</div>
                </br>
					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" id="loginbtn" >
							Sign In
						</button>
					</div>
                </br>
					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Not a member?
						</span>

						<a href="#" class="txt2 bo1">
							Register now
                        </a>
                    </br>
                    <p>or</p>
                </br>
                    <a href="index.html" class="txt2 bo1">
                        Go to main page
                    </a>
					</div>
				</form>
			</div>
		</div>
	</div>

        </form>

        
    </div> <!-- End main content area -->
    
    

    
    
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="footer-about-us">
                        <h2>u<span>Stora</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        
                    </div>
                </div>
                
                <!-- <div class="col-md-4 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Order history</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Vendor contact</a></li>
                            <li><a href="#">Front page</a></li>
                        </ul>                        
                    </div>
                </div> -->
                
                <div class="col-md-6 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title" style="text-align: center;">Categories</h2>
                        <ul>
                            <li style="text-align: center;"><a href="#">Mobile Phone</a></listyle="text-align: center;>
                            <!-- <li><a href="#">Home accesseries</a></li> -->
                            <li style="text-align: center;"><a href="#">TV</a></li>
                            <li style="text-align: center;"><a href="#">Computer</a></li>
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
    
    <script>
        
        // client side validation

        $(function(){
            $("form").submit(function(e){
                var err = [];

                if( $("#emailtxt").val().length == 0)
                    err["email"] = "error";
                else{
                    $("#emailtxt").css("background-color" , "white");
                }                
                if($("#passtxt").val().length == 0)
                    err["pass"] = "error";
                else{
                    $("#passtxt").css("background-color" , "white");
                }
                
                if(err["email"] == "error"){
                    $("#emailtxt").css("background-color" , "red");
                    e.preventDefault();
                }
                if(err["pass"] == "error"){
                    $("#passtxt").css("background-color" , "red");
                    e.preventDefault();
                }
                    

            });

            
        });
        
    </script>

  </body>
</html>

