<?php
// Connect to the database (replace with your own database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$database = "nquiz";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch quiz questions from the database
$sql = "SELECT * FROM questions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<div class='question'>" . $row["question_text"] . "</div>";
    echo "<div class='answer'>" . $row["answer"] . "</div>";
  }
} else {
  echo "No questions found.";
}

$conn->close();
?>
