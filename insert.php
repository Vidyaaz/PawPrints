<html>
<style>
    button {
        background-color:turquoise;
        border: none;
        border-radius: 4px;
        color: white;
        padding: 5px 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-left: 10px;
        cursor: pointer;
    }


</style>
<body>

<?php
session_start();
// Include config file
require_once "config.php";

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (isset($_POST['submit']))
{
    $cname = $_POST['firstname'];

    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $username=$_SESSION['username'];
   




    $squery = "INSERT INTO customer(Customer_Name,Address,custno,Username) VALUES ('$cname','$address',$contact,'$username')";

    if (mysqli_query($link, $squery))
    {
        echo "You have Sucessfully registerd !! LOGIN TO FIND  FIND YOUR PERFECT PET MATCH";
    }






    mysqli_close($link);
}


?>
<br>
<button><a href="logSign.php"> LOGIN </a></button>

</body>


</html>
