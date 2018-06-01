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

    <!----------------------------- Whole content ---------------->
    <div class = "mainContent">
        <?php
			if(!(isset($newUserId))){
			    $newUserId= "UserId";
				//echo $newUserId." before setting";
			}
			else{
				echo $newUserId." is set";
			}
		?>
		

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
            $conn = new mysqli("localhost", "root", "", "MYL");
            //Get values
			
		
           
           // $newUserId = $_POST['newUserId'];  
            //Finding the right button click b/n checklang and addContributor
				echo "this";
                if(isset($_POST['validatenewId'])){
                    checkId();
                }
				elseif(isset($_POST['createAccount'])){
                    createAccount();
                }
				
           
            function checkId(){
				global $newUserId;
				$conn = new mysqli("localhost", "root", "", "MYL");
				$newUserId = $_POST['newUserId'];
                $sql="select userId from userLogin where userId = \"".$newUserId. "\" ;" ;
                $result = mysqli_query($conn, $sql);

                $row_number = $result->num_rows;
				echo $row_number;
                echo $sql;
                if ($row_number == 1 ) {
                    echo "userId already exists! Please choose another id";
					$newUserId = "Invalid UserId";
                }
                else{
                    echo "userId available";
                }
            }
			
			function createAccount(){
				$conn = new mysqli("localhost", "root", "", "MYL");
				$newUserId = $_POST['newUserId'];
				$newUserName= $_POST['newUserName'];
				$newEmail=$_POST['newEmail'];
				$newDob = $_POST['newDob'];
				$newPassword = $_POST['newPassword'];
				$sql= "insert into userLogin(userId,userName,email,dob,password,photoName) values ( \"" .$newUserId. "\", \"".$newUserName. "\", \"".$newEmail."\", \""
				.$newDob."\", \"".$newPassword."\", \"photo.png \");" ;
				echo $sql;
                $result = mysqli_query($conn, $sql);
                header('Location: user.php');
			}
        ?>
   
<!-- _____________________________Footer ____________________-->
			
         <div class = "registerFrame">
            <p>
            <p>Create New Account</p>
            <form method="POST" class = "formController">
				
				<label id = "newUserId"> User Id: </label>
                <input type="text" name= "newUserId" id = "newUserId" <?php if($newUserId==="UserId" || $newUserId==="Invalid UserId"){
			   echo "placeholder=\"".$newUserId."\"";}
			   else{
			   echo "value =\"".$newUserId."\"";}?>" /> 
				<!--I gave the $newUserId as a value to hold the place after they click the validate button. It's not working tho :( -->
                <button name="validatenewId" class = "validateId"><img src = "images/check.svg"></button>
                <span class="underline"></span>
				<label id = "fullName" > Full Name: </label>
               <input type="text" id = "newUserName" method="POST" name="newUserName" placeholder= "Jane Doe"/>
                <span class="underline"></span>
				<label id = "email"> Email: </label>
               <input type="text" id = "newEmail" method="POST" name="newEmail" placeholder= "abc@xyz.com"/>
                <span class="underline"></span>
				<label id = "dob">Date of Birth: </label>
               <input type="text" id = "newDob" method="POST" name="newDob" placeholder= "YYYY-MM-DD" />
                <span class="underline"></span>
				<label id = "password"> Password: </label>
               <input type="password" id = "newPassword" method="POST" name="newPassword" placeholder = "Password" />
                <span class="underline"></span>
				
				<button name="createAccount" type="create" id ="register">Create</button>
               
            </form>
        </div>
	</div>
        <br>
        <div class="allcontain">

			<div class="footer">
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
	</div>
    </body>
</html>