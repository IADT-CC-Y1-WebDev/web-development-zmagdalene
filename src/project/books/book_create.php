<?php
require_once 'php/lib/config.php';
require_once 'php/lib/session.php';
require_once 'php/lib/forms.php';
require_once 'php/lib/utils.php';

startSession();

try {
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
    <title>Add New Book</title>
</head>

<body>
    <div class="container">
        <div class="width-12">
            <?php require 'php/inc/flash_message.php'; ?>
        </div>
        <div class="width-12">
            <h1>Add New Book</h1>
        </div>
        <div class="width-12">
            <form action="book_store.php" method="POST" enctype="multipart/form-data">
                <div class="input">
                    <label for="title" class="special">Title:</label>
                    <div>
                        <input type="text" id="title" name="title" value="<?= old('title') ?>" required>
                        <p><?= error('title') ?></p>
                    </div>
                </div>

                <div class="input">
                    <label for="author" class="special">Author:</label>
                    <div>
                        <input type="text" id="author" name="author" value="<?= old('author') ?>" required>
                        <p><?= error('author') ?></p>
                    </div>
                </div>

                <div class="input">
                    <label for="publisher_id" class="special">Publisher:</label>
                    <div>
                        <select id="publisher_id" name="publisher_id" required>
                            <option value="">--- Select Publishers ---</option>
                            <?php foreach ($publishers as $publisher) { ?>
                                <option value="<?= h($publisher->id) ?>" <?= chosen('publisher_id', $publisher->id) ? "selected" : "" ?>>
                                    <?= h($publisher->name) ?>
                                </option>
                            <?php } ?>
                        </select>
                        <p><?= error('publisher_id') ?></p>
                    </div>
                </div>

                <div class="input">
                    <label for="year" class="special">Year:</label>
                    <input type="text" id="year" name="year" value="<?= old('year') ?>" required>
                    <p><?= error('year') ?></p>
                </div>

                <div class="input">
                    <label for="isbn" class="special">ISBN:</label>
                    <div>
                        <input type="text" name="isbn" id="isbn" value="<?= old('isbn') ?>" required>
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
                                    <?= chosen('format_ids', $format->id) ? "checked" : "" ?>>
                                <label for="format_id<?= h($format->id) ?>"><?= h($format->name) ?></label>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="input">
                    <label for="description" class="special">Description:</label>
                    <textarea name="description" id="description" rows="5" required><?= h(old('description')) ?></textarea>
                </div>

                <div class="input">
                    <label for="cover_filename" class="special">Book Cover Image:</label>
                    <div>
                        <input type="file" name="cover_filename" id="cover_filename" accept="image/*" required>
                        <p><?= error('cover_filename') ?></p>
                    </div>
                </div>

                <div class="buttons">
                    <button class="button"><a href="book_list.php">Cancel</a></button>
                    <button class="button" type="submit">Store Book</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>