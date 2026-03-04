<?php
require_once 'php/lib/config.php';
require_once 'php/lib/utils.php';

$books = Book::findAll();
$publishers = Publisher::findAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'php/inc/head_content.php' ?>
    <title>View Books</title>
</head>

<body>
    <div class="container">
        <div class="width-12 header">

        </div>
    </div>

    <div class="container">
        <p><a href="book_list.php">Books</a></p>    
    </div>

</body>

</html>