<?php
require_once 'php/lib/config.php';
require_once 'php/lib/session.php';
require_once 'php/lib/forms.php';
require_once 'php/lib/utils.php';

startSession();

$errors = getFormErrors();
dd($errors);

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        throw new Exception('Invalid request method.');
    }
    if (!array_key_exists('id', $_GET)) {
        throw new Exception('No book ID provided.');
    }
    $id = $_GET['id'];

    $book = Book::findById($id);
    if ($book === null) {
        throw new Exception("Book not found.");
    }

    $formats = Format::findByBook($book->id);
    $formatIds = [];
    foreach ($formats as $format) {
        $formatIds[] = $format->id;
    }

    $publishers = Publisher::findAll();
    $formats = Format::findAll();

    // preview
    $prevPublisher = Publisher::findById($book->publisher_id);
    $prevFormats = Format::findByBook($book->id);

    $formatNames = [];

    foreach ($prevFormats as $format) {
        $formatNames[] = h($format->name);
    }
} catch (PDOException $e) {
    setFlashMessage('error', 'Error: ' . $e->getMessage());
    redirect('/index.php');
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

                <div class="width-4">
                    <form id="book_form" action="book_update.php" method="POST" enctype="multipart/form-data" data-mode="edit" novalidate>

                        <div id="error_summary_top" class="error-summary" style="display:none" role="alert"></div>

                        <input type="hidden" id="id" name="id" value="<?= h(old('id', $book->id)) ?>">
                        <div class="input">
                            <label for="title" class="special">Title:</label>
                            <div>
                                <input type="text" id="title" name="title" value="<?= h(old('title', $book->title)) ?>" data-minlength="3" data-maxlength="255" required>
                                <p class="error" id="title_error"><?= error('title') ?></p>
                            </div>
                        </div>

                        <div class="input">
                            <label for="author" class="special">Author:</label>
                            <div>
                                <input type="text" id="author" name="author" value="<?= h(old('author', $book->author)) ?>" data-minlength="3" data-maxlength="255" required>
                                <p class="error" id="author_error"><?= error('author') ?></p>
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
                                <p class="error" id="publisher_id_error"><?= error('publisher_id') ?></p>
                            </div>
                        </div>

                        <div class="input">
                            <label for="year" class="special">Year:</label>
                            <input type="text" id="year" name="year" value="<?= h(old('year', $book->year)) ?>" data-length="4" required>
                            <p class="error" id="year_error"><?= error('year') ?></p>
                        </div>

                        <div class="input">
                            <label for="isbn" class="special">ISBN:</label>
                            <div>
                                <input type="text" name="isbn" id="isbn" value="<?= h(old('isbn', $book->isbn)) ?>" data-length="13" required>
                                <p class="error" id="isbn_error"><?= error('isbn') ?></p>
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
                            <p class="error" id="format_ids_error"><?= error('format_ids') ?></p>
                        </div>

                        <div class="input">
                            <label for="description" class="special">Description:</label>
                            <textarea name="description" id="description" rows="5" data-minlength="15" required><?= h(old('description', $book->description)) ?></textarea>
                            <p class="error" id="description_error"><?= error('description') ?></p>
                        </div>

                        <div class="input">
                            <label for="cover" class="special">Book Cover Image (optional):</label>
                            <div>
                                <input type="file" name="cover" id="cover" accept="image/*" />
                                <p class="error" id="cover_error"><?= error('cover') ?></p>
                            </div>
                        </div>

                        <div class="buttons">
                            <button class="button"><a href="book_list.php">Cancel</a></button>
                            <button id="submit_btn" class="button" type="submit">Update Book</button>
                        </div>
                    </form>
                </div>

                <div class="width-1"></div>

                <div class="width-7 preview">
                    <h2>Preview</h2>
                    <div class="hCard">

                        <div class="right-content">
                            <img id="coverPreview" src="images/<?= h($book->cover_filename) ?>" alt="Image For <?= h($book->title) ?>">

                            <div class="actions">
                                <a href="book_edit.php?id=<?= h($book->id) ?>">Edit</a>
                                <a href="book_delete.php?id=<?= h($book->id) ?>">Delete</a>
                                <a href="book_list.php">Back</a>
                            </div>
                        </div>

                        <div class="left-content">
                            <h2 id="titlePreview"><?= h(old('title', $book->title)) ?></h2>
                            <p id="authorPreview">Author: <?= h(old('author', $book->author)) ?></p>
                            <p id="publisherPreview">Publisher: <?= h(old('publisher', $prevPublisher->name)) ?></p>
                            <p id="yearPreview">Publishing Year: <?= h(old('year', $book->year)) ?></p>
                            <p id="isbnPreview">ISBN: <?= h(old('isbn', $book->isbn)) ?></p>
                            <p id="descriptionPreview">Description:<br /><?= nl2br(h(old('description', $book->description))) ?></p>
                            <p id="formatsPreview">Formats: <?= h(implode(', ', $formatNames)) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const formatMap = <?= !empty($formats) ? json_encode(array_column($formats, 'name', 'id')) : '{}' ?>;
        const publisherMap = <?= !empty($publishers) ? json_encode(array_column($publishers, 'name', 'id')) : '{}' ?>;
    </script>
    <script src="js/books-form.js"></script>
    <script src="js/live-inputs.js"></script>
</body>

</html>
<?php
// Clear form data after displaying
clearFormData();
// Clear errors after displaying
clearFormErrors(); ?>