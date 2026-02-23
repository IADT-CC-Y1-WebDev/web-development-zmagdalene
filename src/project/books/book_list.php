<?php

require_once 'php/lib/config.php';
require_once 'php/lib/utils.php';
try {
    $books = Book::findAll();
    $publishers = Publisher::findAll();
    $formats = Format::findAll();
} catch (PDOException $e) {
    die("<p>PDO Exception: " . $e->getMessage() . "</p>");
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
            <?php require 'php/inc/flash_message.php' ?>
            <div class="button">
                <a href="book_create.php"></a>Add New Book
            </div>
        </div>
        <?php if (!empty($books)) { ?>
            <div class="width-12 filters">
                <form>
                    <div>
                        <label for="title_filter">Title:</label>
                        <input type="text" id="title_filter" name="title_filter">
                    </div>
                    <div>
                        <label for="publisher_filter">Publisher:</label>
                        <select name="publisher_filter" id="publisher_filter">
                            <option value="">All Publishers</option>
                            <?php foreach ($publishers as $publisher) { ?>
                                <option value="<?= h($publisher->id) ?>"><?= h($publisher->name) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <label for="format_filter">Format:</label>
                        <select name="format_filter" id="format_filter">
                            <option value="">All Formats</option>
                            <?php foreach ($formats as $format) { ?>
                                <option value="<?= h($format->id) ?>"><?= h($format->name) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <button type="button" id="apply_filters">Apply Filters</button>
                        <button type="button" id="clear_filters">Clear Filters</button>
                    </div>
                </form>
            </div>

        <?php } ?>
    </div>

    <div class="container">
        <?php if (empty($books)) { ?>
            <p>No Books Found.</p>
        <?php } else { ?>
            <div class="width-12 cards">
                <?php foreach ($books as $book) { ?>
                    <div class="card">
                        <div class="topContent">
                            <h2>Title: <?= h($book->title) ?></h2>
                            <p>Author: <?= h($book->author) ?></p>
                        </div>
                        <div class="bottomContent">
                            <img src="Images/<?= h($book->cover_filename) ?>" alt="Image For <?= h($book->title) ?>">
                            <div class="actions">
                                <a href="book_view.php?id=<?= h($book->id) ?>">View</a>
                                <a href="book_edit.php?id=<?= h($book->id) ?>">Edit</a>
                                <a href="book_delete.php?id=<?= h($book->id) ?>">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>

</body>

</html>