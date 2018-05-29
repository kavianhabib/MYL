<!--
Name : Habibuddin
SID : 111236644
Email : habibuddin.ahmadi@stonybrook.edu
Name : Rahel Zewde
SID : 111250334
Email : rahel.zewde@stonybrook.edu

-->
<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel ="stylesheet" href ="index.css">   
        <link rel="stylesheet" href="styles/mystyle.css">
        <link rel = "icon" type = "image/png" href = "favicon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="index.js"></script>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="styles/util.css">
        <link rel="stylesheet" type="text/css" href="styles/main.css">
        <title>
            MYL  
        </title>

    </head>
    <body>
        <!-- Header -->

        <div class = "allcontain">
            <div class = "header">
                <ul class = "socialicon">
                    <li><a href = "#"><i class = "fa fa-facebook"></i></a></li>
                    <li><a href = "#"><i class = "fa fa-twitter"></i></a></li>
                    <li><a href = "#"><i class = "fa fa-google-plus"></i></a></li>
                    <li><a href = "#"><i class = "fa fa-pinterest"></i></a></li>
                </ul>

            </div>          
        </div>



        <div class="allcontain" style="position:relative; text-align:center; height:100%; width:100%;">

            <!--------------------------------------- Login -------------------------->
            <div class="limiter" style="position:relative; text-align:center; height:83%; width:600px; margin-top:40px;">
                <div class="container-login100" >
                    <div class="wrap-login100" >

                        <form method="POST" class="login100-form validate-form" action="user.php">
                            
                                <span class="login100-form-title">
                                Wrong Password or User
                            </span>
                            
                            
                            <div class="wrap-input100 validate-input" data-validate = "Valid id is required: ex@abc.xyz">
                                <input class="input100" type="text" name="id" method="POST" placeholder="User ID">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                <input class="input100" type="password" method="POST" name="password" placeholder="Password">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" method="POST" name ="login">
                                    Login
                                </button>
                            </div>
							
							
                            <div class="text-center p-t-12">
                                <span class="txt1">
                                    Forgot
                                </span>
                                <a class="txt2" name ="forgot"  method="POST"  href="#">
                                    Username / Password?
                                </a>
                            </div>

                            <div class="text-center p-t-136">
                                <a class="txt2" name="create"  method="POST"  href="#">
                                    Create your Account
                                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		
            <!-- ______________________________________________________Bottom Menu ______________________________-->
          
                
                <div class="footer">
                    <div class="copyright">
                        &copy; Copy right 2018 | <a href="#">Privacy </a>| <a href="#">Policy</a>
                    </div>
                    <div class = "infoLinks">
                        <a  href = "contactUs.html" class = "links">Contact</a>
                        <a href = "aboutUs.html" class = "links">About</a>
                        <a href = "newsLetter.html"class = "links">News Letter</a>
                    </div>
                    
                </div>
            </div>
        


        <!--===============================================================================================-->	
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/tilt/tilt.jquery.min.js"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>
    </body>
</html>