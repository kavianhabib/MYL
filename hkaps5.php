<?php
// Name of the file
$filename = 'hkaps.sql';
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'grader';
// MySQL password
$mysql_password = 'allowme';
// Database name
$mysql_database = 'hkaps';
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
// (a)
$sql = "SELECT maker,model,speed FROM PCs P WHERE P.price <= $lowerinputPrice AND P.price >= $upperinputPrice";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "maker: " . $row["maker"]. " - model: " . $row["model"]. " " . $row["speed"]. "<br>";
    }
} else {
    echo "0 results";
}

//add the back and forth check for multiple entries
//(b)
$sql = "SELECT model, speed, ram, hd,screen, price FROM Laptops L WHERE L.speed >= $inputSpeed AND L.ram >= $inputRam AND L.hardDisk >= $inputHd AND L.screen >= $inputScreen ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "model: " . $row["model"]. " - speed: " . $row["speed"]."ram: " . $row["ram"]."hd: " . $row["hd"]."screen: " . $row["screen"]."price: " . $row["price"]  "<br>";
    }
} else {
    echo "0 results";
}
//(c)
$sql = "SELECT model, speed, ram, hd, screen, price FROM Laptops L, Products P WHERE $inputMaker=P.maker AND L.model = P.model ";
$result = $conn->query($sql);
echo "All available laptops from the maker " .$inputMaker
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "model: " . $row["model"]. " - speed: " . $row["speed"]."ram: " . $row["ram"]."hd: " . $row["hd"]."screen: " . $row["screen"]."price: " . $row["price"]  "<br>";
    }
} else {
    echo "0 results";
}
$sql = "SELECT model, speed, ram, hd,  price FROM PCs C, Products P WHERE $inputMaker=P.maker AND C.model = P.model ";
$result = $conn->query($sql);
echo "All available PCs from the maker " .$inputMaker
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "model: " . $row["model"]. " - speed: " . $row["speed"]."ram: " . $row["ram"]."hd: " . $row["hd"]."price: " . $row["price"]  "<br>";
    }
} else {
    echo "0 results";
}
//(d)
$sql = "SELECT C.model,P.model FROM PCs C, Printers P WHERE $inputBudget>=P.price+C.price AND C.speed>=$inputSpeed ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "model of PCs: " . $row["C.model"]. " model of Printers: " . $row["P.model"]  "<br>";
    }
} else {
    echo "0 results";
}
//(e)
$sql = "SELECT model FROM PCs C, Laptops L, Products P WHERE P.model = $inputModel AND P.model = $inputModel OR C.model = inputModel AND $inputBudget = L.price OR 
        $inputBudget = C.price AND $inputRam = L.ram OR $inputRam = C.ram AND $inputSpeed = L.speed OR $inputSpeed = C.speed AND
		$inputMaker = P.maker AND $inputHd = L.hd OR $inputHd = C.hd";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "model : " . $row["model"]  "<br>";
    }
	echo "The Product is already in the Database"
} else {
    $sql = "INSERT INTO Products (maker, model, type)
	VALUES ('$inputMaker', '$inputModel', 'unknown');";
	$sql .= "INSERT INTO PCs (model, speed, ram, hd, price)
	VALUES ('$inputModel', '$inputSpeed', '$inputRam', '$inputHd '$inputBudget');";
	$sql .= "INSERT INTO Laptops (model, speed, ram, hd, screen, price)
	VALUES ('$inputModel', '$inputSpeed', '$inputRam', $inputHd', 'unknown', '$inputBudget');";
	
	if ($conn->multi_query($sql) === TRUE) {
    echo "New PC added successfully";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}









mysqli_close($conn);



 
?>