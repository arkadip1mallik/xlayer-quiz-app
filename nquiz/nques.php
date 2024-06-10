<?php
include_once '../nquiz/connect.php'; 

if(isset($_POST['submit']))
{    
    $id = uniqid('Q-');
     $question_text = $_POST['question_text'];
     $answer = $_POST['answer'];
     
     
     $sql = "INSERT INTO `questions`(`id`, `question_text`, `answer`)
             VALUES ('$id','$question_text','$answer')";
     
    
     if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Question saved successfully.");</script>';
     } else {
        echo '<script>alert("Error: '.mysqli_error($conn).'");</script>';
     }
     mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Questions</title>
    <!-- <style>
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
    </style> -->
</head>

<body>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="./teacher/teacher_dashboard.php">NQUIZ</a>
            </div>
        </div>
    </nav>
<h2 class="d-flex align-items-center justify-content-center">QUIZ</h2>
    <div class="mx-5 mt-5 mb-5" >
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
                <label for="questions" class="form-label">Question</label>
                <input type="text" class="form-control" id="question_text" placeholder="Enter the question" name="question_text" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="answer" class="form-label">Answer</label>
                <button class="btn" type="radio"><input type="answer" class="form-control" id="answer" placeholder="Enter answer" name="answer" required></button>
            </div>
            <div class="mb-3 mt-3">
                <label for="answer" class="form-label">Answer</label>
                <button class="btn" type="radio"><input type="answer" class="form-control" id="answer" placeholder="Enter answer" name="answer" required></button>
            </div>
            <div class="mb-3 mt-3">
                <label for="answer" class="form-label">Answer</label>
                <button class="btn" type="radio"><input type="answer" class="form-control" id="answer" placeholder="Enter answer" name="answer" required></button>
            </div>
            <div class="mb-3 mt-3">
                <label for="answer" class="form-label">Answer</label>
                <button class="btn" type="radio"><input type="answer" class="form-control" id="answer" placeholder="Enter answer" name="answer" required></button>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

  
</body>

</html>
