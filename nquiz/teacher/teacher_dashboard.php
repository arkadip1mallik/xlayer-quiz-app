<?php
include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
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
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/nquiz/teacher/teacher_dashboard.php">NQUIZ</a>
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
        <h1 class="text-center mt-5">Admin Dashboard</h1>
        
        <div class="text-center mt-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addQuizModal" onclick="window.location.href = '/nquiz/nques.php';">Add Quiz</button>
        </div>

        
        <div class="row mt-4">
            <div class="col-md-6 mx-auto">
                <div class="quiz-card p-4">
                    <h2>Quiz 1</h2>
                    <p>To solve this you need some knowledge of Software Development, Web Development & Java</p>
                    <button class="btn btn-primary" onclick="window.location.href = '/nquiz/teacher/ques.php';">View Questions</button>
                </div>
                <div class="quiz-card p-4">
                    <h2>Quiz 2</h2>
                    <p>To solve this you need some basic knowledge of Computer, Python & Java</p>
                    <button class="btn btn-primary" onclick="window.location.href = '/nquiz/teacher/ques1.php';">View Questions</button>
                </div>
                
            </div>
        </div>
    </div>

   
    <div class="modal fade" id="addQuizModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Quiz</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="quizName" class="form-label">Quiz Name</label>
                            <input type="text" class="form-control" id="quizName" required>
                        </div>
                        <div class="mb-3">
                            <label for="quizDescription" class="form-label">Quiz Description</label>
                            <textarea class="form-control" id="quizDescription" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Quiz</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
