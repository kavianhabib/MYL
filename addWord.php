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

            <!-- Navigation Bar -->
            <nav class="topnav" id = "myTopnav">
                <a href="index.html"><div><span class="big">MYL</span><span class="small">con</span></div></a>
                <ul>
                    <li><button>New</button></li>
                    <li>
                        <select class = "dropBox" name= "langsList" method ="POST" id = "langList" >
                            <option>From</option>

                        </select></li>

                    <li><a class="active" href = "pie.html"><img src = "images/setting.svg"></a></li>

                </ul>
                <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
            </nav>           
        </div>

        <!----------------------------- Whole content ---------------->
        <div class = "mainContent">

            <div class = "leftContent">

            </div>
            <div class = "middleContent" >
             
            
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
            //echo "Connected successfully";
            $langId = $_POST['langId'];
            $userType = $_POST['userType'];
            $userId = $_POST['id'];
            if(strcmp($userType,"owner") == 0){
                displayWithFullControl();
            }
            elseif(strcmp($userType,"contributer") == 0){
                displayWithHalfControl();
            }
            elseif(strcmp($userType,"advisor") == 0){
                displayOnlyControl();
            }
            else{
                displayWithoutControl();
            }
            
            function displayWithFullControl(){
                $langId = $_POST['langId'];
            $userType = $_POST['userType'];
            $userId = $_POST['id'];
                $conn = new mysqli("localhost", "root", "", "MYL");
                $sql2 = "select * from ".$langId.";";
                
                $result = mysqli_query($conn,$sql2);
                $row_number = $result->num_rows;
                echo $row_number;
                echo "<div class = \"middleContent\" style = \"position:relative;background: rgba(0,0,0,0.2); border-radius: 15px;float:left;
                overflow-y: auto;
                height: 50%; text-align:center; box-shadow:2px 2px 2px gray;\">";
               
                echo "<table style=\"position:relative; width: 100%;\">";
                if($row_number > 0){
                     while($row = $result->fetch_assoc() ) {
                        echo "<tr><th style =\"border: 1px solid black; width:150px;\">{$row['word']}</th><th style =\"border: 1px solid black; width:75%;\">{$row['translation']}</th></tr>";	 
                        
                    }
                }
                else{
                    echo "<tr><th>Empty</th></tr>";
                }
                echo "</table>";

                echo "</div>";
               
                echo "<div style = \"position:relative; width:100%; float:left;\"><input class=\"input100\" type=\"text\" id = \"word\"name=\"word\" method=\"POST\" placeholder=\"Word\" style= \"position:relative; width: 35%; height:40px; margin:10px; top:30px;left:22%;\">";
                echo "<input class=\"input100\" type=\"text\" id = \"tran\"name=\"translation\" method=\"POST\" placeholder=\"Translation\" style= \"position:relative; width: 35%; height:40px; margin:10px; top:30px; left:22%;\">
                <button style=\"position:relative;top:-38px; left:15%; width:80px; height:30px; background: gray; border-radius:20px;color:white;\">ADD</button></div>";
                
                
            }
                
            
              function displayWithHalfControl(){
                   $langId = $_POST['langId'];
            $userType = $_POST['userType'];
            $userId = $_POST['id'];
                $conn = new mysqli("localhost", "root", "", "MYL");
                $sql2 = "select * from ".$langId.";";
                
                $result = mysqli_query($conn,$sql2);
                $row_number = $result->num_rows;
                echo $row_number;
                echo "<div class = \"middleContent\" style = \"background: rgba(0,0,0,0.2); border-radius: 15px;float:left;
                overflow-y: auto;
                height: 50%; text-align:center; box-shadow:2px 2px 2px gray;\">";
               
                echo "<table style=\"position:relative; width: 100%;\">";
                if($row_number > 0){
                     while($row = $result->fetch_assoc() ) {
                        echo "<tr><th style =\"border: 1px solid black; width:150px;\">{$row['word']}</th><th style =\"border: 1px solid black; width:75%;\">{$row['translation']}</th></tr>";	 
                        
                    }
                }
                else{
                    echo "<tr><th>Empty</th></tr>";
                }
                echo "</table>";
                echo "</div>";
            }
                
                function displayWithoutControl(){
           
                $langId = $_POST['langId'];
                $conn = new mysqli("localhost", "root", "", "MYL");
                $sql2 = "select * from ".$langId.";";
                
                $result = mysqli_query($conn,$sql2);
                $row_number = $result->num_rows;
                echo $row_number;
                echo "<div class = \"middleContent\" style = \"background: rgba(0,0,0,0.2); border-radius: 15px;float:left;
                overflow-y: auto;
                height: 50%; text-align:center; box-shadow:2px 2px 2px gray;\">";
               
                echo "<table style=\"position:relative; width: 100%;\">";
        
                if($row_number > 0){
                     while($row = $result->fetch_assoc() ) {
                        echo "<tr><th style =\"border: 1px solid black; width:150px;\">{$row['word']}</th><th style =\"border: 1px solid black; width:75%;\">{$row['translation']}</th></tr>";	 
                        
                    }
                }
                else{
                    echo "<tr><th>Empty</th></tr>";
                }
                echo "</table>";
                echo "</div>";
            
                }
            mysqli_close($conn);

            ?>
            </div>
            <div class = "rightContent"></div>
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