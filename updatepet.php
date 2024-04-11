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
$petid = $_GET['pid'];
$va1=$_POST['pname'];
$va2=$_POST['breed'];
$va3=$_POST['vaccination'];
$va4=$_POST['price'];
$va5=$_POST['gender'];
$va6=$_POST['depid'];
$va7=$_POST['image'];


//check if the department id exists else there will be a foreign key constraint.

$sql = "SELECT * from department where Dept_id = $va6";
if($result = mysqli_query($link, $sql)){
if(mysqli_num_rows($result) > 0)
{
$sql1= "UPDATE pet set p_name='$va1', breed = '$va2',vaccination='$va3', price=$va4,gender='$va5' ,depid=$va6,image='$va7' where  pid =$petid";
if($result = mysqli_query($link, $sql1))
{
echo "PET DETAILS UPDATED SUCCESSFULLY";
echo "<br>";
echo "<a href='admin.php'><button>BACK</button></a>";
}
}
else
{
    echo "You have entered an invalid department id";
    echo "<br>";
    echo "<a href='editpet.php?var=$petid'><button>BACK</button></a>";

}
} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>
