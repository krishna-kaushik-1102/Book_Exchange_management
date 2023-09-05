<?php
require_once('config.php');

$sql = "SELECT books.*, users.username FROM books
        INNER JOIN users ON books.user_id = users.id";
$result = mysqli_query($conn, $sql);
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Exchange</title>
</head>
<body>
    <h1>Available Books for Exchange</h1>
    
    <?php foreach ($books as $book): ?>
        <h2><?php echo $book['title']; ?></h2>
        <p>Author: <?php echo $book['author']; ?></p>
        <p>Genre: <?php echo $book['genre']; ?></p>
        <p>Description: <?php echo $book['description']; ?></p>
        <p>Owner: <?php echo $book['username']; ?></p>
        <hr>
    <?php endforeach; ?>
    
    <a href="login.php">Login</a> to add your books.
    <a href="register.php">Register</a> if you don't have an account.
</body>
</html>
