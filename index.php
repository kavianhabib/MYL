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
                        <form method="post" class = "dictionary">
                            <div class = "firstRow">
                                <select class = "dropBox" name= "fromLang" id = "fromLang" >
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
                                    <select>
                                    <?php foreach($users as $user): ?>
                                        <option value="<?= $user['langId']; ?>"><?= $user['langId']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                
                                <select class = "dropBox" name="toLang" id = "toLang">
                                <option value="To..">To</option>
                                    <?php foreach($users as $user): ?>
                                        <option value="<?= $user['langId']; ?>"><?= $user['langId']; ?></option>
                                    <?php endforeach; ?>
                                
                            </select></div>
                            <div><textarea row = "4" cols = "80" name="fromText" class = "textArea"id = "fromTextArea" placeholder="Your thoughts..."></textarea>
                            <textarea row = "4" cols = "80" name="toText" class = "textArea" id = "toTextArea" placeholder="Our projections..."></textarea></div>
                            
                            <button type="submit" name="translate" value="submit" id = "search">Search</button>
                            
                            
                        </form>

                        <form method="post" class="login100-form validate-form">
                            <div class="login100-pic js-tilt" data-tilt>
                                <img src="images/img-01.png" alt="IMG">
                                <span class="login100-form-title">
                                Member Login
                            </span>
                            </div>
                            
                            <div class="wrap-input100 validate-input" data-validate = "Valid id is required: ex@abc.xyz">
                                <input class="input100" type="text" name="id" placeholder="User ID">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                <input class="input100" type="password" name="password" placeholder="Password">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" name ="login">
                                    Login
                                </button>
                            </div>

                            <div class="text-center p-t-12">
                                <span class="txt1">
                                    Forgot
                                </span>
                                <a class="txt2" name ="forgot" href="#">
                                    Username / Password?
                                </a>
                            </div>

                            <div class="text-center p-t-136">
                                <a class="txt2" name="create" href="#">
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
            // Name of the file
            $filename = 'MYL.sql';
            // MySQL host
            $mysql_host = 'localhost';
            // MySQL username
            $mysql_username = 'grader';
            // MySQL password
            $mysql_password = 'allowme';
            // Database name
            $mysql_database = 'MYL';
            //Reading the sql file
            mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
            // Select database
            mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

            // Temporary variable, used to store current query
            $templine = '';
            // Read in entire file
            $lines = file($filename);
            // Loop through each line
            foreach ($lines as $line)
            {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;

            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';')
            {
                // Perform the query
                mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                // Reset temp variable to empty
                $templine = '';
            }
            }
            //Get values
            $fromText = $_POST['fromText'];
            $toText = $_POST['toText'];
            $userId = $_POST['id'];
            $password = $_POST['password'];
            $fromLang = $_POST['fromLang'];
            $toLang = $_POST['toLang'];
                
            //Finding the right button click b/n login and translate
            if($_GET){
                if(isset($_GET['translate'])){
                    translate();
                }elseif(isset($_GET['login'])){
                    login();
                }elseif(isset($_GET['create'])){
                    create();
                }elseif(isset($_GET['forgot'])){
                    forgot();
            }

            function translate(){
            // handeling translation
            $fromTextArray = explode(" ", $pizza);

                for ($x = 0; $x <= count($fromTextArray); $x++) {
                    $sqlTranslate = "SELECT translation FROM \" " .$fromLang. " \"WHERE word = \" " .$fromTextArray[x]. " \" ;" ;
                    echo $sqlTranslate;
                    $resultFrom = mysqli_query($conn, $sqlTranslate);

                    $row_numberFrom = $resultFrom->num_rows;

                    if ($row_numberFrom = 1) {
                        $rowFrom = $resultFrom->fetch_assoc();
                      //  $fromWord= $rowFrom['translation'];

                        $sqlTo = "SELECT word FROM \" " .$toLang. " \" WHERE translation = \" " .$rowFrom['translation']. " \" ;" ;
                        
                        echo $sqlTo;
                        
                        $resultTo = mysqli_query($conn, $sqlTo);
                        $row_numberTo = $resultTo->num_rows;

                        if ($row_numberTo = 1) {
                            $rowTo = $resultTo->fetch_assoc()
                            $toWord = $toWord. " ". $row['translation'];
                        }
                        else{
                            echo "<textarea id=\"toText\" Translation not found :( </textarea>";
                        }

                    } else {
                        echo "<textarea id=\"toText\" Translation not found :( </textarea>";
                    }
                } 
                echo "<textarea id=\"toText\" " .$toWord . "</textarea>";
            }
                
            function login(){
                $sql = "SELECT password FROM userLogin WHERE userId = \" .$userId. \" AND password = \".$password. \" ;" ;
                $result = mysql_query($sql);
                if ($row_number = 1) {
                    header('Location: user.php'); 
                }
                else{
                    //print underneath
                    echo "Invalid UserId or Password"
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