<?php

$file = $_GET["file"];
$file_handler = fopen($file, "r");  
$content = fread($file_handler, filesize($file));  
fclose($file_handler);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Main Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>main{padding:20px;}</style>
</head>
<body>
    <header class="bg-dark text-white py-3">
        <div class="container mt-5">
            <nav>
            <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?file=home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?file=about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?file=contact.php">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">
        <?php
            echo $content;
        ?>
    </main>
    <footer class="bg-dark text-white py-3">
        <div class="container text-center">
            <p>&copy; <?php echo date('Y'); ?> Your Website. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
