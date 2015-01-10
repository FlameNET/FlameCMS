<?php
include("../application/config/database.php");

// Name of the file
$filename = '../sql/FlameCMS.sql';
// MySQL host
$mysql_host = $db["auth"]["hostname"];
// MySQL username
$mysql_username = $db["auth"]["username"];
// MySQL password
$mysql_password = $db["auth"]["password"];
// Database name
$mysql_database = $db["auth"]["database"];

// Connect to MySQL server
$msc=mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database) or die('Error connecting to MySQL server: ' . mysqli_error());

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
    $msq=mysqli_query($msc,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($msc) . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
 echo "Tables imported successfully";
?>
