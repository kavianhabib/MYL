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
            Tak Shopper   
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
       
        <div class = "registerFrame">
            <p>
            <p>Create New Language</p>
            <form class = "formController">
                <label id = "nameLabel">Name: </label>
                <input type="text" id = "name" name="languageName" placeholder = "Language Name">
                <span class="underline"></span>
                <label id = "idContributer">Contributer: </label>
                <input type="text" name="userId" id = "id" placeholder = "User ID">
                <button name="addContributor" class = "addContributer"><img src = "images/add.svg"></button>
                <span class="underline"></span>
                <button name="checkLang" class = "checkLang"><img src = "images/check.svg"></button>
                <label id = "descriptionLabel">Description: </label>
                <textarea id = "description" name="description" rows = "15" cols="36"></textarea>
                
                
                <button name="submit" type="submit" id ="register">Submit</button>
            </form>
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
            $addContributor = $_POST['addContributor'];
            $userId = $_POST['userId'];
            $languageName = $_POST['languageName'];
            $description = $_POST['description'];
            $checkLang = $_POST['checkLang'];
            
                
            //Finding the right button click b/n login and translate
            if($_GET){
                if(isset($_GET['addContributor'])){
                    addContributor();
                }elseif(isset($_GET['checkLang'])){
                    checkLang();
                }elseif(isset($_GET['submit'])){
                    create();
            }
            function addContributor(){
                $sql="SELECT userId FROM userLogin WHERE userId \" " .$userId. "\" ;"
                $result = mysqli_query($conn, $sql);

                $row_number = $result->num_rows;

                echo $sql;
                if ($row_number = 1 ) {
	                 $sqlAdd = "INSERT INTO contributor (userId,langId) VALUES ( \"".$userId." \", \" " .$langId. " \" );" ;  
                    $resultUpdate = mysqli_query($conn, $sqlAdd);
                    $sqlUpdate = "Update users set contributor=TRUE where userId = \" ".$userId. "\" ;";
                 }
                else{
                    echo "invalid userId"
                }
            }
            function checkLang(){
                $sql="select langId from languages where langId = \" ".$languageName. "\ ;" ;
                $result = mysqli_query($conn, $sql);

                $row_number = $result->num_rows;

                echo $sql;
                if ($row_number = 1 ) {
                    echo "Language already exists!";
                }
                else{
                    $sql="create table " .$languageName. "(
                            word VARCHAR(256) NOT NULL,
                            translation VARCHAR(256) NOT NULL,
                            PRIMARY KEY (word)
                        );";
                    $result = mysqli_query($conn, $sql);
                    
                    $sql="insert into languages(langId,userId) values ( \" " .$userId. "\", \" ".$languageName. " \" ;"; 
                }
            }
        ?>
   
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