<?php
include 'config.php';

$sql = "SELECT id, title, content, author, date FROM posts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cybersecurity Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .jumbotron {
            background-color: #343a40;
            color: white;
        }

        footer {
            background-color: #343a40;
            color: white;
        }

        .recent-posts ul {
            padding-left: 0;
            list-style-type: none;
        }

        .recent-posts ul li {
            margin-bottom: 10px;
        }

        .recent-posts ul li a {
            color: #007bff;
            text-decoration: none;
        }

        .recent-posts ul li a:hover {
            text-decoration: underline;
        }

        .blog-post {
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .blog-post h2 {
            font-size: 1.75rem;
        }

        .blog-post .post-meta {
            color: #555;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Cybersecurity Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    <header class="jumbotron jumbotron-fluid bg-dark text-white text-center">
        <div class="container">
            <h1 class="display-4">Welcome to My Cybersecurity Blog</h1>
            <p class="lead">Exploring the latest in cybersecurity trends, tips, and news.</p>
        </div>
    </header>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='blog-post'>";
                        echo "<h2>" . $row["title"] . "</h2>";
                        echo "<p class='post-meta'>Posted on " . $row["date"] . " by " . $row["author"] . "</p>";
                        echo "<p>" . $row["content"] . "</p>";
                        echo "<a href='#' class='btn btn-primary'>Read More</a>";
                        echo "</div>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
            <div class="col-md-4">
                <aside class="bg-light p-4 rounded recent-posts">
                    <h3 class="mb-3">Recent Posts</h3>
                    <ul>
                        <li><a href="#">How to Secure Your Wi-Fi Network</a></li>
                        <li><a href="#">Top 10 Cybersecurity Tools for 2024</a></li>
                        <li><a href="#">Understanding Malware and How to Avoid It</a></li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-3">
        <p>© 2024 Cybersecurity Blog. All rights reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
