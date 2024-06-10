<?php
include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
   
    <style>
        
        .quiz-card {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #lgout {
            background: #001e4d;
            color: #fff;
            font-weight: 500;
            border: 0;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        #lgout:hover {
            background: #003366; 
        }
        h1{
            color: #fff;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="./user_dashboard.php">NQUIZ</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/nquiz" data-toggle="modal" data-target="#logoutModal">
                        <button id="lgout">Logout</button>
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <h1 class="text-center mt-2"><b>User Dashboard</b></h1>

       
        <div class="row mt-4">
            <div class="col-md-6 mx-auto">
                <div class="quiz-card p-4">
                    <h2>Quiz 1</h2>
                  <p>To solve this you need some knowledge of Software Development, Web Development & Java</p>
                    <button class="btn btn-primary" onclick="window.location.href = '/nquiz/ques.php';">Take Quiz</button>
                </div>
                <div class="quiz-card p-4">
                    <h2>Quiz 2</h2>
                   <p>To solve this you need some basic knowledge of Computer, Python & Java</p>
                    <button class="btn btn-primary" onclick="window.location.href = '/nquiz/ques2.php';">Take Quiz</button>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
