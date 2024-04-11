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
$eid = $_GET['var'];

//check if employee is a manager then show a message that he cannot be deleted. To delete we first need to update the department table.
$sql="SELECT * from department where Mgr_Name in ( SELECT employee.Emp_name from employee where employee.Emp_id = $eid)";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

        echo "This employee cannot be deleted because of manegerial position";
    }
    else{
        $sql1 = "Delete from employee where Emp_id = $eid";
        if ($result = mysqli_query($link, $sql1))
        {
                  echo "Employee Successfully deleted";
        }


    }
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