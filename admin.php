<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .tab {
            float: left;
            border: 1px solid #ccc;
            background-color: black;
            width: 20%;
            height:195px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            display: block;
            background-color: inherit;
            color: white;
            padding: 22px 16px;
            width: 100%;
            border: none;
            outline: none;
            text-align: left;
            /*cursor: pointer;
            /*transition: 0.3s;*/
            font-size: 17px;


        }

        clearfix {
            overflow: auto;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color:turquoise;
        }

        /* Create an active/current "tab button" class */
        .tab button.active {
            background-color:turquoise ;
        }

        /* Style the tab content */
        .tabcontent {
            float: left;
            padding: 0px 12px;

            border: transparent;
            width: 70%;
            border-left: none;
            height: 300px;
        }
    </style>
</head>
<body>

<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">ADD PET</button>
    <button class="tablinks" onclick="openCity(event, 'Paris')">ORDER DETAILS</button>
    <button class="tablinks" onclick="openCity(event, 'Tokyo')">EMPLOYEE DETAILS</button>
    <button class="tablinks" onclick="openCity(event, 'Cario')">PET DETAILS</button>

    <button class="tablinks" onclick="openCity(event, 'Paris')"><a href="http://localhost/PawPrints/PawPrints/">SIGN OUT</a></button>


</div>

<div id="London" class="tabcontent">
    <?php

    require_once "config.php";
    if(isset($_POST['submitbtn']))
    {
        $sql1 = "INSERT INTO pet (pid,p_name,breed,vaccination,price,gender,depid,image) VALUES (?, ?,?,?,?,?,?,?)";

        $stmt1 = mysqli_prepare($link, $sql1);
        mysqli_stmt_bind_param($stmt1, "isssssis",$va1,$va2,$va3,$va4,$va5,$va6,$va7,$va8);
        $va1=$_POST['pid'];
        $va2=$_POST['pname'];
        $va3=$_POST['breed'];
        $va4=$_POST['vaccinated'];
        $va5=$_POST['price'];
        $va6=$_POST['gender'];
        $va7=$_POST['depid'];
        $va8=$_POST['image'];
        mysqli_stmt_execute($stmt1);
    }

    ?>



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

    <!--<h2>Responsive Checkout Form</h2>
    <p>Resize the browser window to see the effect. When the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other.</p> -->
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="row">
                        <div class="col-50">
                            <h1>DETAILS</h1>
                            <!--  <h3>Billing Address</h3> -->
                            <label for="fname"><i class=""></i> pid</label>
                            <input type="text" id="fname" name="pid">
                            <label for="email"><i class=""></i> Pname</label>
                            <input type="text" id="email" name="pname">
                            <label for="adr"><i class=""></i>Breed</label>
                            <input type="text" id="adr" name="breed">
                            <label for="city"><i class=""></i> Gender</label>
                            <input type="text" id="city" name="gender">
                            <label for="city"><i class=""></i> Price</label>
                            <input type="text" id="city" name="price">
                            <label for="city"><i class=""></i> Vaccinated</label>
                            <input type="text" id="city" name="vaccinated">
                            <label for="city"><i class=""></i> Depid</label>
                            <input type="text" id="city" name="depid">
                            <label for="city"><i class=""></i> image</label>
                            <input type="text" id="city" name="image"><br>
                            <input type="submit" name="submitbtn">

                        </div>
                    </div>

                </form>
            </div>
        </div>



    </div>




</div>

<div id="Paris" class="tabcontent">
    <?php
    
    $sql = "SELECT * from customer c ,order_details o where c.cid=o.cid";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table>";
            echo "<tr>";
            echo "<th>order id</th>";
            echo "<th>customer id</th>";
            echo "<th>price</th>";
            echo "<th>pid</th>";
            echo "<th>status</th>";
            echo "<th>Date of purchase</th>";
            echo "<th>Date of delivery</th>";
            echo "<th>Customer Name</th>";
            echo "<th>Action</th>";

            echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['order_id'] . "</td>";
                echo "<td>" . $row['Cid'] . "</td>";
                echo "<td>" . $row['Total_Price'] . "</td>";
                echo "<td>" . $row['Pid'] . "</td>";
                echo "<td>" . $row['Status'] . "</td>";
                echo "<td>" . $row['Date_Purchased'] . "</td>";
                echo "<td>" . $row['Date_Delivered'] . "</td>";
                echo "<td>" . $row['Customer_Name'] . "</td>";
                $oid=$row['order_id'];
                echo "<td><a href='orderupdate.php?var=$oid'><button>EDIT</button></a>"."</td>";


                echo "</tr>";

            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    }
    else
    {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
  //  mysqli_close($link);
    ?>
</div>
<div id="Tokyo" class="tabcontent">
<?php
 $sql1 = "SELECT * from employee e inner join department d on e.Dept_Id = d.Dept_id";
 
 if($result = mysqli_query($link, $sql1)){
    
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
        echo "<tr>";
        echo "<th>Employee ID </th>";
        echo "<th>Employee Name </th>";
        echo "<th>Dob</th>";
        echo "<th>Address</th>";
        echo "<th>Contact</th>";
        echo "<th>Dept_Id</th>";
        echo "<th>D_Name</th>";
        echo "<th>Mgr_Name</th>";
        echo "<th>EDIT</th>";
        echo "<th>DELETE</th>";

        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['Emp_id'] . "</td>";
            echo "<td>" . $row['Emp_name'] . "</td>";
            echo "<td>" . $row['Dob'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<td>" . $row['Contact'] . "</td>";
            echo "<td>" . $row['Dept_Id'] . "</td>";
            echo "<td>" . $row['D_Name'] . "</td>";
            echo "<td>" . $row['Mgr_Name'] . "</td>";
            $eid=$row['Emp_id'];
            echo "<td><a href='editadmin.php?var=$eid'><button>EDIT</button></a>"."</td>";
            echo "<td><a href='deleteadmin.php?var=$eid'><button>DELETE</button></a>"."</td>";



          //  echo "<a href='orderupdate.php?var=$oid'><button>EDIT</button></a>";
            echo "</tr>";

        }
        echo "</table>";
        echo "<br>";
        echo "<button style=margin-left:500px><a href='insertemployee.php'>Insert Details</button></a>";
    }
 }
 else
 {
     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
 }
 //mysqli_close($link);
?>

</div>
<div id="Cario" class="tabcontent">
<?php
 $sql2 = "SELECT * from pet";
 
 if($result = mysqli_query($link, $sql2)){
    
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
        echo "<tr>";
        echo "<th>Pet ID </th>";
        echo "<th>Pet Name </th>";
        echo "<th>Breed</th>";
        echo "<th>Vaccination</th>";
        echo "<th>Price</th>";
        echo "<th>Gender</th>";
        echo "<th>DepId</th>";
        echo "<th>image</th>";
        echo "<th>EDIT</th>";
        //echo "<th>DELETE</th>";

      

        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['pid'] . "</td>";
            echo "<td>" . $row['p_name'] . "</td>";
            echo "<td>" . $row['breed'] . "</td>";
            echo "<td>" . $row['vaccination'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['depid'] . "</td>";
            echo "<td>" . $row['image'] . "</td>";
            $petid=$row['pid'];
            echo "<td><a href='editpet.php?var=$petid'><button>EDIT</button></a>"."</td>";
            /*echo "<td><a href='deletepet.php?var=$petid'><button>DELETE</button></a>"."</td>";*/

            //echo "<td><a href='deleteadmin.php?var=$eid'><button>DELETE</button></a>"."</t
            //echo "<a href='orderupdate.php?var=$oid'><button>EDIT</button></a>";
            echo "</tr>";

        }
        echo "</table>";

    }
 }
 else
 {
     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
 }
 mysqli_close($link);
?>
</div>


<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

</body>
</html>

