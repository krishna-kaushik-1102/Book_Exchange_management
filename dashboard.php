<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
}

require_once('config.php');
$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM books WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .dashboard-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .welcome-message {
            text-align: center;
            margin-bottom: 20px;
        }
        .book-list {
            list-style: none;
            padding: 0;
        }
        .book-list-item {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .book-details {
            flex-grow: 1;
        }
        .request-link {
            color: #007bff;
            text-decoration: none;
        }
        .request-link:hover {
            text-decoration: underline;
        }
        .action-links {
            display: flex;
            justify-content: space-between;
        }
        .action-links a {
            color: #007bff;
            text-decoration: none;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        /* ... (your existing CSS styles) ... */
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1 class="welcome-message">Welcome, <?php echo $_SESSION['username']; ?></h1>
        
        <h2>Your Listed Books</h2>
        <ul class="book-list">
            <?php foreach ($books as $book): ?>
                <li class="book-list-item">
                    <div class="book-details">
                        <strong><?php echo $book['title']; ?></strong> by <?php echo $book['author']; ?><br>
                        <em>Genre:</em> <?php echo $book['genre']; ?><br>
                        <?php echo $book['description']; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <h2>Available Books for Exchange</h2>
        <ul class="book-list">
            <?php
            // Retrieve available books (not listed by the logged-in user)
            $sql = "SELECT * FROM books WHERE user_id <> {$_SESSION['user_id']}";
            $result = mysqli_query($conn, $sql);
            
            while ($book = mysqli_fetch_assoc($result)):
            ?>
                <li class="book-list-item">
                    <div class="book-details">
                        <strong><?php echo $book['title']; ?></strong> by <?php echo $book['author']; ?><br>
                        <em>Genre:</em> <?php echo $book['genre']; ?><br>
                        <?php echo $book['description']; ?>
                    </div>
                    <div class="action-links">
                        <a class="request-link" href="request_book.php?book_id=<?php echo $book['id']; ?>">Request</a>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
        
        <div class="action-links">
            <a href="add_book.php">Add Book</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>

</body>
</html>

