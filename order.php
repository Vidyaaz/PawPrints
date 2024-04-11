<?php
session_start();

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


$pid=$_GET['var'];


$squery = "SELECT * FROM pet where pid=$pid";
$result = mysqli_query($link, $squery);
$row=mysqli_fetch_array($result);
$value=$row[4];
$username=$_SESSION['username'];
$squery1="SELECT cid from customer where username='$username'";
$result = mysqli_query($link, $squery1);
$row=mysqli_fetch_array($result);
$cid=$row['cid'];
//echo $cid;








//$cid=$_SESSION['id'];



$query = "INSERT INTO order_details (Cid,Total_Price,Pid,Date_Delivered) VALUES ('$cid','$value','$pid',null)";

if (mysqli_query($link, $query))
{

}


mysqli_close($link);
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        div {
            margin-bottom: 15px;
            padding: 4px 12px;
        }
.order{
    margin-left: 10px;

}


        .success {
            background-color: turquoise;
            border-left: 6px solid black;
        }
        button {
            background-color:turquoise;
            border: none;
            border-radius: 12px;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-left: 250px;
            cursor: pointer;
        }

        table {
            margin-top: 10px;
            margin-left: 10px;
            border-collapse: collapse;
            width: 40%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color:turquoise;
            color: white;
        }




    </style>
</head>
<body>



<div class="success">
    <p><strong>Success!</strong> </p>
</div>
<div class="order">
    <p><strong>YOUR DETAILS</strong></p>
</div>
<?php
$link = mysqli_connect("localhost", "root", "", "petadoption");

// Check connection
if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());

}



$sql = "SELECT * FROM pet where pid =$pid";





if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
        echo "<tr>";
        echo "<th>pid</th>";
        echo "<th>petname</th>";
        echo "<th>breed</th>";
        echo "<th>gender</th>";
        echo "<th>vaccinated</th>";
        echo "<th>price</th>";

        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['pid'] . "</td>";
            echo "<td>" . $row['p_name'] . "</td>";
            echo "<td>" . $row['breed'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['vaccination'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


mysqli_close($link);
?>







<br>
<button type="button" ><a href="http://localhost/PawPrints/PawPrints/catdog.php">BACK</a> </button><br>
</body>
</html>
