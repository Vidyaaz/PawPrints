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
$sql=" SELECT * from employee where employee.Emp_id = $eid";
if ($result=mysqli_query($link,$sql))
{
}
else{
    echo "Something went wrong";
}

    
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body {
                font-family: Arial;
                font-size: 17px;
                padding: 8px;
            }

            * {
                box-sizing: border-box;
            }

            .row {
                display: -ms-flexbox; /* IE10 */
                display: flex;
                -ms-flex-wrap: wrap; /* IE10 */
                flex-wrap: wrap;
                margin: 0 -16px;
            }

            .col-25 {
                -ms-flex: 25%; /* IE10 */
                flex: 25%;
            }

            .col-50 {
                -ms-flex: 50%; /* IE10 */
                flex: 50%;
            }

            .col-75 {
                -ms-flex: 75%; /* IE10 */
                flex: 75%;
            }

            .col-25,
            .col-50,
            .col-75 {
                padding: 0 16px;
            }

            .container {
                background-color: black;
                /* padding: 5px 20px 15px 20px;*/
                color: white;
                border: 1px solid lightgrey;
                border-radius: 3px;
                padding-left: 60px;
                margin-left: 100px;
                margin-right: 200px;
                padding-top: 10px;
                padding-bottom: 30px;
            }
            table {
            margin-top: 50px;
            margin-left: 150px;
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




            input[type=text] {
                width: 90%;
                margin-bottom: 20px;
                padding: 12px;
                border: 2px solid turquoise;
                border-radius: 12px;
                background-color: black;
                color: white;
            }

            label {
                margin-bottom: 10px;
                display: block;
            }

            /* icon-container {
                 margin-bottom: 20px;
                 padding: 7px 0;
                 font-size: 24px;
             }*/

            submitbtn {
                background-color: black;
                border: 2px solid turquoise;
                border-radius: 14px;
                color: white;
                padding: 10px 15px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin-left: 230px;
                cursor: pointer;

            }
            button:hover {
                background-color: turquoise;
                border: 2px solid turquoise;

            }

            a {
                color: #2196F3;
            }

            hr {
                border: 1px solid lightgrey;
            }

            span.price {
                float: right;
                color: grey;
            }

            /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
            @media (max-width: 800px) {
                .row {
                    flex-direction: column-reverse;
                }
                .col-25 {
                    margin-bottom: 20px;
                }
            }
        </style>
    </head>
    <body>
        <div class="row">
        <div class="col-75">
            <div class="container">
            <h1>EMPLOYEE DETAILS</h1>
            <form action= "updateadmin.php?eid=<?php echo $eid ?>" method="post">
            
            <div class="row">
                        <div class="col-50">

            <?php

while($row = mysqli_fetch_array($result))
{
    echo "<label for='fname'><i class=''></i> Employee ID</label>";
    echo "<input disabled type='text' id='empid' name='eid' value='".$row['Emp_id']."'>";
    echo "<label for='fname'><i class=''></i> Employee Name</label>";
    echo "<input  type='text' id='ename' name='ename' value='".$row['Emp_name']."'>";
    echo "<label for='fname'><i class=''></i> Date of Birth</label>";
    echo "<input  type='date' id='dob' name='dob' value='".$row['Dob']."'>";
    echo "<label for='fname'><i class=''></i> Address</label>";
    echo "<input  type='text' id='adress' name='address' value='".$row['Address']."'>";
    echo "<label for='fname'><i class=''></i> Contact</label>";
    echo "<input  type='text' pattern='^\d{10}$' id='contact' title='10 numeric characters only' required name='contact' value='".$row['Contact']."'>";
    echo "<label for='fname'><i class=''></i> Department ID</label>";
    echo "<input  type='text' id='dept' name='dept' value='".$row['Dept_Id']."'>";
    echo "<br>";
    echo "<button>SUBMIT</button></a>";
          


}

            ?>
               </div>
                    </div>

                        </form>

            </div>
            </div>
            </html>


        



