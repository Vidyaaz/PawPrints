<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'petadoption');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$oid = $_GET['var'];

$sql="UPDATE order_details set status='Completed', Date_Delivered =CURRENT_TIMESTAMP where order_id=$oid";
if($result = mysqli_query($link, $sql))
{
echo "ORDER DETAILS UPDATED SUCCESSFULLY";

}

mysqli_close($link);

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<br>
<button type="button" ><a href="http://localhost/PawPrints/PawPrints/admin.php">BACK</a> </button><br>
</html>

