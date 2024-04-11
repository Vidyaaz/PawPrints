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
    <div>
    
    
    <?php

    require_once "config.php";
    if(isset($_POST['submitbtn']))
    {
        $sql1 = "INSERT INTO employee (Emp_name,Dob,Address,Contact,Dept_Id) VALUES (?,?,?,?,?)";

        $stmt1 = mysqli_prepare($link, $sql1);
        mysqli_stmt_bind_param($stmt1, "ssssi",$va1,$va2,$va3,$va4,$va5);
        $va1=$_POST['Emp_name'];
        $va2=$_POST['Dob'];
        $va3=$_POST['adr'];
        $va4=$_POST['Contact'];
        $va5=$_POST['deptId'];
        mysqli_stmt_execute($stmt1);
    }

    ?>

   
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="row">
                        <div class="col-50">
                            <h1>EMPLOYEE DETAILS</h1>
                            <label for="Emp_name"><i class=""></i> Employee Name</label>
                            <input type="text" id="Emp_name" name="Emp_name">

                            <label for="Dob"><i class=""></i> Date of Birth</label>
                            <input type="date" id="Dob" name="Dob">

                            <label for="adr"><i class=""></i>Address</label>
                            <input type="text" id="adr" name="adr">

                            <label for="Contact"><i class=""></i> Contact</label>
                            <input type="text" pattern="^\d{10}$" id="Contact" title="10 numeric characters only" required name="Contact">

                            <label for="deptId"><i class=""></i> Department Id </label>
                            <input type="text" id="city" name="deptId">

                            
                            <br>
                            <input style ="margin-left:400px" type="submit" name="submitbtn">


                        </div>
                    </div>

                </form>
            </div>
        </div>



    </div>




</div>
    </body>
</html>