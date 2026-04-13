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
<html lang="en" data-theme="<?php echo $_COOKIE['theme'] ?? 'light'; ?>">

<head>
    <?php include 'php/inc/head_content.php'; ?>
    <title>Add New Book</title>
</head>

<body data-page="book_create.php">
    <div class="container">
        <div class="width-12">
            <?php require 'php/inc/flash_message.php'; ?>
        </div>
        <div class="width-12">
            <h1>Add New Book</h1>
        </div>
        <div class="width-4">

            <form id="book_form" action="book_store.php" method="POST" enctype="multipart/form-data" data-mode="create" novalidate>

                <div id="error_summary_top" class="error-summary" style="display:none" role="alert"></div>

                <div class="input">
                    <label for="cover" class="special">Cover Image:</label>
                    <div>
                        <input type="file" name="cover" id="cover" accept="image/*" value="" required>
                        <p class="error" id="cover_error"><?= error('cover') ?></p>
                    </div>
                </div>

                <div class="input">
                    <label for="title" class="special">Title:</label>
                    <div>
                        <input type="text" id="title" name="title" value="<?= h(old('title')) ?>" data-minlength="3" data-maxlength="255" required>
                        <p class="error" id="title_error"><?= error('title') ?></p>
                    </div>
                </div>

                <div class="input">
                    <label for="author" class="special">Author:</label>
                    <div>
                        <input type="text" id="author" name="author" value="<?= h(old('author')) ?>" data-minlength="3" data-maxlength="255" required>
                        <p class="error" id="author_error"><?= error('author') ?></p>
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
                        <p class="error" id="publisher_id_error"><?= error('publisher_id') ?></p>
                    </div>
                </div>

                <div class="input">
                    <label for="year" class="special">Year:</label>
                    <input type="text" id="year" name="year" value="<?= h(old('year')) ?>" data-length="4" required>
                    <p class="error" id="year_error"><?= error('year') ?></p>
                </div>

                <div class="input">
                    <label for="isbn" class="special">ISBN:</label>
                    <div>
                        <input type="text" name="isbn" id="isbn" value="<?= h(old('isbn')) ?>" data-length="13" required>
                        <p class="error" id="isbn_error"><?= error('isbn') ?></p>
                    </div>
                </div>

                <div class="input">
                    <fieldset>
                        <legend class="special">Available Formats:</legend>
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
                        <p class="error" id="format_ids_error"><?= error('format_ids') ?></p>
                    </fieldset>
                </div>

                <div class="input">
                    <label for="description" class="special">Description:</label>
                    <textarea name="description" id="description" rows="5" data-minlength="15" required><?= h(old('description')) ?></textarea>
                    <p class="error" id="description_error"><?= error('description') ?></p>
                </div>

                <div class="buttons">
                    <button class="button"><a href="book_list.php">Cancel</a></button>
                    <button id="submit_btn" class="button" type="submit">Store Book</button>
                </div>
            </form>
        </div>

        <div class="width-1"></div>

        <div class="width-7 preview">

            <div class="content">
                <h2>Preview</h2>
                <div class="hCard prevCard flex">

                    <div class="right-content">
                        <img id="coverPreview" src="images/" alt="">

                        <div class="actions">
                            <a>Edit</a>
                            <a>Delete</a>
                            <a>Back</a>
                        </div>
                    </div>

                    <div class="left-content">
                        <h2 id="titlePreview">Title</h2>
                        <p id="authorPreview">Author: </p>
                        <p id="publisherPreview">Publisher: </p>
                        <p id="yearPreview">Publishing Year: </p>
                        <p id="isbnPreview">ISBN: </p>
                        <p id="descriptionPreview">Description: </p>
                        <p id="formatsPreview">Formats: </p>
                    </div>
                </div>

                <div class="card prevCard hidden">

                    <div class="topContent">
                        <h2 id="titlePreview2">Title</h2>
                        <p id="authorPreview2">Author: </p>
                    </div>

                    <div class="bottomContent">
                        <img id="coverPreview2" src="images/" alt="">
                        <div class="actions">
                            <a class="view">View</a>
                            <a class="edit">Edit</a>
                            <a class="delete">Delete</a>
                        </div>
                    </div>
                </div>

                <div class="toggle" id="toggle">
                    <div class="toggleBtn selected" id="toggleBtn1">1</div>
                    <div class="toggleBtn" id="toggleBtn2">2</div>
                </div>
            </div>
        </div>

    </div>
    <script>
        const formatMap = <?= !empty($formats) ? json_encode(array_column($formats, 'name', 'id')) : '{}' ?>;
        const publisherMap = <?= !empty($publishers) ? json_encode(array_column($publishers, 'name', 'id')) : '{}' ?>;
    </script>
    <script src="js/click-toggle.js"></script>
    <script src="js/books-form.js"></script>
    <script src="js/live-inputs.js"></script>
    <script src="js/theme-selector.js"></script>
</body>

</html>
<?php
// Clear form data after displaying
clearFormData();
// Clear errors after displaying
clearFormErrors(); ?>