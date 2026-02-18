<?php
require_once 'php/lib/config.php';
$books = Book::findAll();
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
        <div class="width-12">
            <div class="hCard">
                <div class="bottomContent">
                    <div class="actions">
                        <a href="">Edit</a>
                        <a href="">Delete</a>
                        <a href="">Back</a>
                    </div>
                </div>

                <div class="bottomContent">
                    <h2><?= htmlspecialchars($book->title) ?></h2>
                </div>
            </div>
        </div>
    </div>

</body>

</html>