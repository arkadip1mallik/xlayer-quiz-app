<?php
session_start();
include("../connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['email'];
    $Password = $_POST[ 'pswd'];
    //$d;

    if (!empty($Email) && !empty($Password)) {
        $sql = "SELECT * FROM user WHERE email = '$Email' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if ($result) {
        if ($result && mysqli_num_rows($result) > 0) {   
            $user_data = mysqli_fetch_assoc($result);
           // $d = json_encode($user);
            
            if ($user_data['Password'] == $Password) {
                echo "<script type='text/javascript'>alert('Login successfully');</script>";
                }header('Location: /nquiz/user/user_dashboard.php');
                die;
             
        } 
    } echo "<script type='text/javascript'>alert('Wrong username or password');</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Wrong username or password');</script>";
    }
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for centering and styling the login form */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            max-width: 600px;
            padding: 80px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2 class="text-center mb-5">Login as a User</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-4">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>
                <div class="mb-5">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit" onclick="window.location.href = '../user/user_dashboard.php';">Login</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
