<?php
require_once 'php/lib/config.php';
require_once 'php/lib/session.php';
require_once 'php/lib/forms.php';
require_once 'php/lib/utils.php';

startSession();

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
    $formatIds = [];
    foreach ($formats as $format) {
        $formatIds[] = h($format->id);
    }

    $publishers = Publisher::findAll();
    $formats = Format::findAll();
} catch (PDOException $e) {
    setFlashMessage('error', 'Error: ' . $e->getMessage());
    redirect('/book_list.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'php/inc/head_content.php'; ?>
    <title>Edit Book</title>
</head>

<body>
    <div class="container">
        <div class="width-12">
            <?php require 'php/inc/flash_message.php'; ?>
        </div>
        <div class="width-12">
            <h1>Edit Book</h1>
        </div>
        <div class="width-12 content">
            <div class="container">

                <div class="width-5">
                    <form action="book_store.php" method="POST" enctype="multipart/form-data">
                        <div class="input">
                            <label for="title" class="special">Title:</label>
                            <div>
                                <input type="text" id="title" name="title" value="<?= old('title', $book->title) ?>" required>
                                <p><?= error('title') ?></p>
                            </div>
                        </div>

                        <div class="input">
                            <label for="author" class="special">Author:</label>
                            <div>
                                <input type="text" id="author" name="author" value="<?= old('author', $book->author) ?>" required>
                                <p><?= error('author') ?></p>
                            </div>
                        </div>

                        <div class="input">
                            <label for="publisher_id" class="special">Publisher:</label>
                            <div>
                                <select id="publisher_id" name="publisher_id" required>
                                    <option value="">--- Select Publishers ---</option>
                                    <?php foreach ($publishers as $publisher) { ?>
                                        <option value="<?= h($publisher->id) ?>" <?= chosen('publisher_id', $publisher->id, $book->publisher_id) ? "selected" : "" ?>>
                                            <?= h($publisher->name) ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <p><?= error('publisher_id') ?></p>
                            </div>
                        </div>

                        <div class="input">
                            <label for="year" class="special">Year:</label>
                            <input type="text" id="year" name="year" value="<?= old('year', $book->year) ?>" required>
                            <p><?= error('year') ?></p>
                        </div>

                        <div class="input">
                            <label for="isbn" class="special">ISBN:</label>
                            <div>
                                <input type="text" name="isbn" id="isbn" value="<?= old('isbn', $book->isbn) ?>" required>
                                <p><?= error('isbn') ?></p>
                            </div>
                        </div>

                        <div class="input">
                            <label for="format_id" class="special">Available Formats:</label>
                            <div>
                                <?php foreach ($formats as $format) { ?>
                                    <div>
                                        <input type="checkbox"
                                            id="format_id<?= h($format->id) ?>"
                                            name="format_ids[]"
                                            value="<?= h($format->id) ?>"
                                            <?= chosen('format_ids', $format->id, $formatIds) ? "checked" : "" ?>>
                                        <label for="format_id<?= h($format->id) ?>"><?= h($format->name) ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                            <p><?= error('format_ids') ?></p>
                        </div>

                        <div class="input">
                            <label for="description" class="special">Description:</label>
                            <textarea name="description" id="description" rows="5" required><?= h(old('description', $book->description)) ?></textarea>
                            <?php if (error('description')): ?>
                                <p class="error"><?= error('description') ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="input">
                            <label for="cover_filename" class="special">Book Cover Image (optional):</label>
                            <div>
                                <input type="file" name="cover_filename" id="cover_filename" accept="image/*">
                                <p><?= error('cover_filename') ?></p>
                            </div>
                        </div>

                        <div class="buttons">
                            <button class="button"><a href="book_list.php">Cancel</a></button>
                            <button class="button" type="submit">Update Book</button>
                        </div>
                    </form>
                </div>

                <div class="width-7 preview">
                    <h2>Preview</h2>
                    <div class="hCard">

                        <div class="bottom-content">
                            <img src="Images/<?= h($book->cover_filename) ?>" alt="Image For <?= h($book->title) ?>">

                            <div class="actions">
                                <a href="book_edit.php?id=<?= h($book->id) ?>">Edit</a>
                                <a href="book_delete.php?id=<?= h($book->id) ?>">Delete</a>
                                <a href="book_list.php">Back</a>
                            </div>
                        </div>

                        <div class="bottom-content">
                            <h2><?= h($book->title) ?></h2>
                            <p>Author: <?= h($book->author) ?></p>
                            <p>Publisher: <?= h($publisher->name) ?></p>
                            <p>Publishing Year: <?= h($book->year) ?></p>
                            <p>ISBN: <?= h($book->isbn) ?></p>
                            <p>Description:<br /><?= nl2br(h($book->description)) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
// Clear form data after displaying
clearFormData();
// Clear errors after displaying
clearFormErrors(); ?>