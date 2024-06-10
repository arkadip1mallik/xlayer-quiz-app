<?php
include_once '../connect.php'; // Assuming your database connection code is in connect.php

if(isset($_POST['submit']))
{    
     $name = $_POST['name'];
     $EnrollmentID = uniqid('USER-');
     $email = $_POST['email'];
     $pswd = $_POST['pswd'];
     $ph = $_POST['ph'];
     $addr = $_POST['addr'];
     
     // SQL query to insert data into the teacher table
     $sql = "INSERT INTO `user`(`Name`, `Enrollment id`, `Email`, `Password`, `Phone Number`, `Address`)
             VALUES ('$name','$EnrollmentID','$email','$pswd','$ph', '$addr')";
     
     // Execute the SQL query and check for success
     if (mysqli_query($conn, $sql)) {
        echo '<script>alert("You are successfully registered.");</script>';
     } else {
        echo '<script>alert("Error: '.mysqli_error($conn).'");</script>';
     }
     mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User signup</title>
    <style>
        #login {
            background: #001e4d;
            color: #fff;
            font-weight: 500;
            border: 0;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        #login:hover {
            background: #003366; /* Darker shade on hover */
        }
    </style>
</head>

<body>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="./Signup.php">NQUIZ</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/nquiz/user/login.php" data-toggle="modal" data-target="#logoutModal">
                        <button id="login">Login</button>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
<h2 class="d-flex align-items-center justify-content-center">New User Registration</h2>
    <div class="mx-5 mt-5 mb-5" >
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
            </div>
            <!-- <div class="mb-3 mt-3">
                <label for="EID" class="form-label">EnrollmentID:</label>
                <input type="number" class="form-control" id="EID" placeholder="Enter EnrollmentID" name="EnrollmentID" required>
            </div> -->
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
            </div>
            <div class="mb-3">
                <label for="ph" class="form-label">Phone Number:</label>
                <input type="number" class="form-control" id="ph" placeholder="Enter phone number" name="ph" required>
            </div>
            <div class="mb-3">
                <label for="addr" class="form-label">Address:</label>
                <input type="text" class="form-control" id="addr" placeholder="Enter address" name="addr" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
