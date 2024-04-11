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
$eid = $_GET['eid'];
//$var=$_POST['var'];
//$va1=$_POST['edi'];
$va2=$_POST['ename'];
$va3=$_POST['dob'];
$va4=$_POST['address'];
$va5=$_POST['contact'];
$va6=$_POST['dept'];
//check if the department id exists else there will be a foreign key constraint.
$sql = "SELECT * from department where Dept_id = $va6";
if($result = mysqli_query($link, $sql)){
if(mysqli_num_rows($result) > 0)
{
$sql1= "UPDATE employee set Emp_name='$va2', Dob = '$va3',Address='$va4', Contact=$va5,Dept_Id=$va6  where  Emp_id =$eid";
if($result = mysqli_query($link, $sql1))
{
echo "EMPLOYEE DETAILS UPDATED SUCCESSFULLY";
echo "<br>";
echo "<a href='admin.php'><button>BACK</button></a>";
}
}
else
{
    echo "You have entered an invalid department id";
    echo "<br>";
    echo "<a href='editadmin.php?var=$eid'><button>BACK</button></a>";
}
} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>
