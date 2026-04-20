<?php

require_once 'php/lib/config.php';
require_once 'php/lib/utils.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET' || !array_key_exists('id', $_GET)) {
    die("<p>Error: No book ID provided.</p>");
}
$id = $_GET['id'];

try {
    $book = Book::findById($id);
    if ($book === null) {
        die("<p>Error: Book not found.</p>");
    }

    $publisher = Publisher::findById($book->publisher_id);
    $formats = Format::findByBook($book->id);

    $formatNames = [];

    foreach ($formats as $format) {
        $formatNames[] = h($format->name);
    }
} catch (PDOException $e) {
    setFlashMessage('error', 'Error: ' . $e->getMessage());
    redirect('/book_list.php');
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?php echo $_COOKIE['theme'] ?? 'light'; ?>">

<head>
    <?php include 'php/inc/head_content.php'; ?>
    <title>View Book</title>
</head>

<body data-page="book_view.php">
    <?php include 'php/inc/delete_dialog.php' ?>

    <div class="container">
        <div class="width-12 header">
            <?php require 'php/inc/flash_message.php'; ?>
        </div>
    </div>
    <div class="container">
        <div class="width-12" id="book_cards">
            <div class="hCard book" data-title="<?= h($book->title) ?>">
                <div class="right-content">
                    <img src="images/<?= h($book->cover_filename) ?>" alt="Image For <?= h($book->title) ?>">

                    <div class="actions">
                        <a class="edit" href="book_edit.php?id=<?= h($book->id) ?>">Edit</a>
                        <a class="delete deleteBtn" href="book_delete.php?id=<?= h($book->id) ?>" data-book-id=<?= h($book->id) ?> data-book-title="<?= h($book->title) ?>">Delete</a>
                        <a class="back" href="book_list.php">Back</a>
                    </div>
                </div>

                <div class="left-content">
                    <h2><?= h($book->title) ?></h2>
                    <p>Author: <?= h($book->author) ?></p>
                    <p>Publisher: <?= h($publisher->name) ?></p>
                    <p>Publishing Year: <?= h($book->year) ?></p>
                    <p>ISBN: <?= h($book->isbn) ?></p>
                    <p>Description:<br /><?= nl2br(h($book->description)) ?></p>
                    <p>Formats: <?= h(implode(', ', $formatNames)) ?></p>
                </div>
            </div>
        </div>
    </div>

    <script src="js/click-toggle.js"></script>
    <script src="js/delete.js"></script>
</body>

</html>