<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
}

require_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    // Collect other book details

    $user_id = $_SESSION["user_id"];
    $sql = "INSERT INTO books (user_id, title, author) VALUES ('$user_id', '$title', '$author')";
    mysqli_query($conn, $sql);
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h1>Add Book</h1>
    
    <form method="post" action="">
        <input type="text" name="title" placeholder="Title" required><br>
        <input type="text" name="author" placeholder="Author" required><br>
       
<input type="text" name="description" placeholder="Description" required><br>
<input type="text" name="genre" placeholder="Genre" required><br>
<button type="submit">Add Book</button>
</form>

        <!-- Add other input fields for book details -->
        <button type="submit">Add Book</button>
    </form>
    
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
