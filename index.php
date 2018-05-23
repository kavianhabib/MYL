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
// Populate the drop boxes "From" and "To"
$sql = "SELECT langId FROM languages";
$result = mysql_query($sql);

echo "<select languages>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['langId'] . "'></option>";
}
echo "</select>";

$sql = "SELECT langId FROM languages";
$result = mysql_query($sql);

echo "<select languages>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['langId'] . "'></option>";
}
echo "</select>";


mysqli_close($conn);

?>