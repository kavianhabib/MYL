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



        <div class="allcontain">

            <!--------------------------------------- Login -------------------------->
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100">
                        <form method="POST" class = "dictionary">
                            <div class = "firstRow">
                                <select class = "dropBox" name= "fromLang" method ="POST" id = "fromLang" >
                                <option value="Select from..">From</option>
                                    <?php
                                    //Connect to our MySQL database using the PDO extension.
                                    $pdo = new PDO('mysql:host=localhost;dbname=MYL', 'root', '');
                                    //Our select statement. This will retrieve the data that we want.
                                    $sql = "SELECT langId FROM languages";
                                    //Prepare the select statement.
                                    $stmt = $pdo->prepare($sql);
                                    //Execute the statement.
                                    $stmt->execute();
                                    //Retrieve the rows using fetchAll.
                                    $users = $stmt->fetchAll();
                                    ?>
                                    <?php foreach($users as $user): ?>
										<option value="<?= $user['langId']; ?>"><?= $user['langId']; ?></option>
                                    <?php endforeach; ?>
									</select>
                                
                                <select class = "dropBox" name="toLang" method="POST"id = "toLang">
                                <option value="To..">To</option>
                                    <?php foreach($users as $user): ?>
                                        <option value="<?= $user['langId']; ?>"><?= $user['langId']; ?></option>
                                    <?php endforeach; ?>
                                
                            </select></div>
                            <div><textarea row = "4" cols = "80" name="fromText" method="POST"  class = "textArea"id = "fromTextArea" placeholder="Your thoughts..."></textarea>
                            <textarea row = "4" cols = "80" method="POST"  name="toText" class = "textArea" id = "toTextArea" placeholder="Our projections..."></textarea></div>
                            
                            <button type="submit" name="translate" method="POST" value="submit" id = "search">Search</button>
                            
                            
                        </form>

                        <form method="POST" class="login100-form validate-form">
                            <div class="login100-pic js-tilt" data-tilt>
                                <img src="images/img-01.png" alt="IMG">
                                <span class="login100-form-title">
                                Member Login
                            </span>
                            </div>
                            
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
			<!-- ________________________________________________PHP  ______________________________-->
			<?php
            $servername = "localhost";
			$username = "root";
			$password = "";
			$database = "MYL";
			// Create connection
			$conn = new mysqli($servername, $username, $password, $database);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			echo "Connected successfully";
			//Values
            
           
                
            //Finding the right button click b/n login and translate
                if(isset($_POST['translate'])){
					echo "translating";
                     translate();
                }
				elseif(isset($_POST['login'])){
					echo "loging in";
                    login();
                }
				elseif(isset($_POST['create'])){
                    create();
                }
				elseif(isset($_POST['forgot'])){
                    forgot();
				}
            

            function translate(){
			$conn = new mysqli("localhost", "root", "", "MYL");
            // handeling translation
			 $fromText = $_POST['fromText'];
			 echo $fromText;
			  $fromLang = $_POST['fromLang'];
			  echo $fromLang;
			  $toLang = $_POST['toLang'];
			  echo $toLang;
              $toWord=" ";
              $fromTextArray = explode(" ", $fromText);
                for ($i=0; $i < count($fromTextArray); $i++) {
                    $sqlTranslate = "SELECT translation FROM " .$fromLang. " WHERE word = \"" .$fromTextArray[$i]. "\" ;" ;
					echo $sqlTranslate;
					
                    $resultFrom = mysqli_query($conn, $sqlTranslate);

                    $row_numberFrom = $resultFrom->num_rows;
					echo $row_numberFrom;
                    if ($row_numberFrom = 1) {
                        $rowFrom = $resultFrom ->fetch_assoc();
                      //  $fromWord= $rowFrom['translation'];

                        $sqlTo = "SELECT word FROM " .$toLang. " WHERE translation = \"" .$rowFrom['translation']. "\" ;" ;
                        
                        echo $sqlTo;
                        
                        $resultTo = mysqli_query($conn, $sqlTo);
                        $row_numberTo = $resultTo->num_rows;

                        if ($row_numberTo = 1) {
                            $rowTo = $resultTo->fetch_assoc();
                            $toWord = $toWord. " ". $rowTo['word'];
                        }
                        else{
                            echo "it is not working";
                        }

                    } else {
                        echo "it is not working";
                    }
                } 
                echo "<textarea row = \"4\" cols = \"80\" style=\" position:relative; width:44%; left: 95px; top:-230px;\" method=\"POST\"  name=\"toText\" class = \"textArea\" id = \"toTextArea\" placeholder=\"Our projections...\">".$toWord."</textarea>";
            }
            
            function login(){
				$conn = new mysqli("localhost", "root", "", "MYL");
				$userId = $_POST['id'];
				$password = $_POST['password'];
                $sql2 = "SELECT password FROM userLogin WHERE userId = \"" .$userId. "\" AND password = \"".$password. "\" ;" ;
				echo $sql2;
                $result = mysqli_query($conn, $sql2);
				$row_number = $result->num_rows;
                if ($row_number == 1) {
                    header('Location: user.php'); 
					echo "correct user";
                }
                else{
                    //print underneath
                    echo "Invalid UserId or Password";
                }                
            }     
            function forgot(){
                header('Location: forgot.php'); 
            }
            function create(){
                header('Location: create.php'); 
            }
        
            mysqli_close($conn);
			
            ?>
	
            <!-- ______________________________________________________Bottom Menu ______________________________-->
          
                
                <div class="bottomsocial">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
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