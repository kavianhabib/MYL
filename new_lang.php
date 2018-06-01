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
			
			if(empty($languageName)){
				global $languageName;
			    $languageName= "languageName";
				echo $languageName." before setting";
			}
			else{
				global $languageName;
				$languageName=$_POST['languageNames'];
				echo $languageName."after setting";
			}
			if(empty($contributorId)){
				global $contributorId;
			    $contributorId= "contributorId";
				echo $contributorId." before setting";
			}
			else{
				global $contriubtorId;
				$contriubtorId=$_POST['contributorId'];
				echo $contributorId."after setting";
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
			
		
           
           // $checkLang = $_POST['checkLang'];  
            //Finding the right button click b/n checklang and addContributor
                if(isset($_POST['checkLang'])){
                     checkLang();
                }
				elseif(isset($_POST['addContributor'])){
                    addContributor();
                }
				elseif(isset($_POST['create'])){
                    create();
                } 
				
				
            function addContributor(){
				$conn = new mysqli("localhost", "root", "", "MYL");
				global $contributorId;
				if(isset($_POST['languageNames'])){
					$languageName = $_POST['languageName'];
				}
				$contributorId=$_POST['contributorId'];
                $sql="SELECT userId FROM userLogin WHERE userId =\"" .$contributorId. "\" ;";
				echo $sql;
                $result = mysqli_query($conn, $sql);

                $row_number = $result->num_rows;

                if ($row_number == 1 ) {
	                $sqlAdd = "INSERT INTO contributor (userId,langId) VALUES ( \"".$contributorId." \", \" " .$languageName. " \" );" ;  
                    $resultUpdate = mysqli_query($conn, $sqlAdd);
                    $sqlUpdate = "Update users set contributor=TRUE where userId = \"".$contributorId. "\" ;";
                 }
                else{
					$contributorId="Invalid UserId";
                    echo "invalid userId";
                }
            }
            function checkLang(){
				global $languageName;
				
				if(isset($_POST['contributorId'])){
					$contributorId = $_POST['contributorId'];
				}
				$conn = new mysqli("localhost", "root", "", "MYL");
				$languageName = $_POST['languageNames'];
				$description = $_POST['description'];
                $sql="select langId from languages where langId = \"".$languageName. "\" ;" ;
                $result = mysqli_query($conn, $sql);

                $row_number = $result->num_rows;
				echo $row_number;
                echo $sql;
                if ($row_number == 1 ) {
					$languageName="Unavailable Name";
                    echo "Language already exists! Please choose another name";
                }
                else{
                    echo "Language name available";
                }
            }
			function create(){
				$languageName = $_POST['languageNames'];
				$description = $_POST['description'];
				$sql="create table " .$languageName. "(
                            word VARCHAR(256) NOT NULL,
                            translation VARCHAR(256) NOT NULL,
                            PRIMARY KEY (word)
                        );";
						echo $sql;
                    $result = mysqli_query($conn, $sql);
                    $ownerUserId=$_POST['id'];
                    $sql="insert into languages(langId,userId) values ( \" " .$languageName. "\", \" ".$ownerUserId. " \" , \" ".$description. " \" ;"; 
			}
        ?>
			
        <div class = "registerFrame">
            <p>
            <p>Create New Language</p>
            <form method="POST" class = "formController">
				<label id = "nameLabel">Name: </label>
               <input type="text" id = "name" method="POST" name="languageNames" 
			   <?php if($languageName==="languageName" || $languageName==="Unavailable Name"){
			   echo "placeholder=\"".$languageName."\"";}
			   else{
			   echo "value =\"".$languageName."\"";}?>" />
                <span class="underline"></span>
                <label id = "idContributer">Contributer: </label>
                <input type="text" name= "contributorId" id = "id"<?php if($contributorId==="contributorId" || $contributorId==="Invalid UserId"){
			   echo "placeholder=\"".$contributorId."\"";}
			   else{
			   echo "value =\"".$contributorId."\"";}?>" />
                <button name="addContributor" class = "addContributer"><img src = "images/add.svg"></button>
                <span class="underline"></span>
                <button name="checkLang" class = "checkLang"><img src = "images/check.svg"></button>
                <label id = "descriptionLabel">Description: </label>
                <textarea id = "description" name="description" rows = "15" cols="30"></textarea>
                
                <button name="submit" method="POST" type="submit" id ="register">Submit</button>
            </form>
        </div>
        
    </div>
<!-- _____________________________Footer ____________________-->
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