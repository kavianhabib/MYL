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
            $userId=$_POST['id'];
			echo $userId;
            checkUserDictionaries();
            function checkUserDictionaries(){
                $conn = new mysqli("localhost", "root", "", "MYL");
                $userId = $_POST['id'];
                $sql2 = "select * from users where userId = \"".$userId."\";";
                
                $result = mysqli_query($conn,$sql2);
                $row_number = $result->num_rows;
                echo $row_number;
                if($row_number > 0){
                    getUserData();
                }
                else{
                    getData();
                }
            }
            
            function getUserData(){
                $conn = new mysqli("localhost", "root", "", "MYL");
                $userId = $_POST['id'];
                $sql2 = "select * from users where userId =  \"".$userId."\";";
                
                $result = mysqli_query($conn,$sql2);
                $row_number = $result->num_rows;
                
                echo"<div class = \"middleContent\">";
                
                if($row_number > 0){
                    while($row = $result->fetch_assoc() ) {
                        echo "<form method=\"POST\" class=\"languagesForm\" action=\"addWord.php\">";
                        echo "<div class = \"smallBoxes\" style = \"position:relative; width:100px; height:100px; background:rgba(0,0,0,0.5); float:left; margin:15px; border-radius:25px;\">
                        <textarea row = \"1\" cols = \"10\" name=\"langId\" method=\"POST\"  style = \"display:none;\"class=\"languagesForm\">{$row['langId']}</textarea>
                        <textarea row = \"1\" cols = \"10\" name=\"userType\" method=\"POST\"  style = \"display:none;\"class=\"languagesForm\">{$row['userType']}</textarea>
                        <textarea row = \"1\" cols = \"10\" name=\"id\" method=\"POST\"  style = \"display:none;\"class=\"languagesForm\">$userId</textarea><button type = \"submit\"><p> {$row['langId']}</p><p> {$row['userType']}</p><p> {$row['wordsInput']}</p></button>
                       
                        </div>";
                        echo("</form>");
                        
                    }
                }
                else{
                     echo "it is not working";
                }
                
                echo"</div>";
            }

            function getData(){
                $conn = new mysqli("localhost", "root", "", "MYL");
                // getting data
                $userId = $_POST['id'];
                $sqlTranslate = "SELECT * FROM  Languages;" ;
                //echo $sqlTranslate;

                $resultFrom = mysqli_query($conn, $sqlTranslate);

                $row_numberFrom = $resultFrom->num_rows;
                //echo $row_numberFrom;
                echo"<div class = \"middleContent\">";
                
                if ($row_numberFrom >0) {
                    while($row = $resultFrom->fetch_assoc() ) {
                        echo "<form method=\"POST\" class=\"languagesForm\" action=\"addWord.php\">";
                        echo "<div class = \"smallBoxes\" style = \"position:relative; width:100px; height:100px; background:rgba(0,0,0,0.5); float:left; margin:20px;border-radius:25px;\">
                        <textarea row = \"1\" cols = \"10\" name=\"langId\" method=\"POST\"  style = \"display:none;\"class=\"languagesForm\">{$row['langId']}</textarea>
                        <textarea row = \"1\" cols = \"10\" name=\"userType\" method=\"POST\"  style = \"display:none;\"class=\"languagesForm\">0</textarea>
                        <textarea row = \"1\" cols = \"10\" name=\"id\" method=\"POST\"  style = \"display:none;\"class=\"languagesForm\">$userId</textarea><button type = \"submit\" style=\"position:relative;height:100%;width:100%;\"><p> {$row['langId']}</p></button></div>";	 
                        echo("</form>");
                    }

                } else {
                    echo "it is not working";
                }
                
                echo"</div>";

            }

            mysqli_close($conn);

            ?>

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