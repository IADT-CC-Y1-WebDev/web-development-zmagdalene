<?php
require_once 'php/lib/config.php';
echo "php works!";

$books = Book::findAll();

foreach ($books as $book) {
    echo $book->title . "<br>";
}

$publishers = Publisher::findAll();

foreach ($publishers as $publisher) {
    echo $publisher->name . "<br>";
}
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
        <div class="button">Add New Game</div>
    </div>

</body>

</html>