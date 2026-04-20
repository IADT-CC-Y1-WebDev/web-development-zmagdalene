<?php
require_once 'php/lib/config.php';
require_once 'php/lib/utils.php';

try {
    $books = Book::findAll();
    $publishers = Publisher::findAll();
    $formats = Format::findAll();

    $bookFormats = [];
    foreach ($books as $book) {
        $bookFormats = Format::findByBook($book->id);
        $bookFormatsMap[$book->id] = h(implode(',', array_map(fn($f) => $f->id, $bookFormats)));
    }
} catch (PDOException $e) {
    die("<p>PDO Exception: " . $e->getMessage() . "</p>");
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?php echo $_COOKIE['theme'] ?? 'light'; ?>">

<head>
    <?php include 'php/inc/head_content.php' ?>
    <title>View Books</title>
</head>

<body data-page="book_list.php">
    <?php if (empty($books)) { ?>
        <p>No Books Found.</p>
    <?php } else {
        include 'php/inc/delete_dialog.php' ?>
    <?php } ?>

    <div class="container">
        <div class="width-12 header">
            <?php require 'php/inc/flash_message.php' ?>
        </div>

        <div class="width-12 header">
            <div class="theme-selector">
                <div class="head">
                    <p>Try Me!</p>
                </div>

                <div class="themes">
                    <div class="themeContainer" data-theme='light'>
                        <div id="light" class="theme"><i class="fa-regular fa-sun"></i></div>
                        <p class="lightTxt">light</p>
                    </div>

                    <div class="themeContainer" data-theme='dark'>
                        <div id="dark" class="theme"><i class="fa-regular fa-moon"></i></div>
                        <p class="darkToggle">dark</p>
                    </div>

                    <div class="themeContainer" data-theme='beige'>
                        <div id="beige" class="theme"><i class="fa-solid fa-book-open"></i></div>
                        <p class="beigeTxt">beige</p>
                    </div>

                    <div class="themeContainer" data-theme='nature'>
                        <div id="nature" class="theme"><i class="fa-solid fa-leaf"></i></div>
                        <p class="natureTxt">nature</p>
                    </div>
                </div>
            </div>

            <div class="button">
                <a href="book_create.php">Add New Book</a>
            </div>
        </div>
        <?php if (!empty($books)) { ?>
            <div class="width-12 filters">
                <form id="filters">

                    <div>
                        <label for="title_filter" class="filter-label">Title:</label>

                        <input type="text" id="title_filter" name="title_filter">
                    </div>

                    <div>
                        <label for="publisher_filter" class="filter-label">Publisher:</label>

                        <select name="publisher_filter" id="publisher_filter">
                            <option value="">All Publishers</option>
                            <?php foreach ($publishers as $publisher) { ?>
                                <option value="<?= h($publisher->id) ?>"><?= h($publisher->name) ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <label for="format_filter" class="filter-label">Format:</label>

                        <select name="format_filter" id="format_filter">
                            <option value="">All Formats</option>
                            <?php foreach ($formats as $format) { ?>
                                <option value="<?= h($format->id) ?>"><?= h($format->name) ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <label class="filter-label" for="sort_by">Sort:</label>

                        <select id="sort_by" name="sort_by">
                            <option value="title_asc">Title A–Z</option>
                            <option value="year_desc">Year (newest first)</option>
                            <option value="year_asc">Year (oldest first)</option>
                        </select>

                    </div>

                    <div>
                        <button type="button" id="apply_filters" class="button">Apply Filters</button>
                        <button type="button" id="clear_filters" class="button">Clear Filters</button>
                    </div>

                </form>
            </div>

        <?php } ?>
    </div>

    <div class="container">
        <div class="width-12">
            <h1 class=" none hidden">No Books Found.</h1>
        </div>

        <?php if (empty($books)) { ?>
            <p>No Books Found.</p>
        <?php } else { ?>
            <div id="book_cards" class="width-12 cards">
                <?php foreach ($books as $book) { ?>
                    <div class="card book"
                        data-title="<?= h($book->title) ?>"
                        data-publisher="<?= h($book->publisher_id) ?>"
                        data-format="<?= h($bookFormatsMap[$book->id]) ?>"
                        data-year="<?= h($book->year) ?>">
                        <div class="topContent">
                            <h2><?= h($book->title) ?></h2>
                            <p>Author: <?= h($book->author) ?></p>
                        </div>
                        <div class="bottomContent">
                            <img src="images/<?= h($book->cover_filename) ?>" alt="Image For <?= h($book->title) ?>">
                            <div class="actions">
                                <a class="view" href="book_view.php?id=<?= h($book->id) ?>">View</a>
                                <a class="edit" href="book_edit.php?id=<?= h($book->id) ?>">Edit</a>
                                <a class="deleteBtn" href="book_delete.php?id=<?= h($book->id) ?>" data-book-id=<?= h($book->id) ?> data-book-title="<?= h($book->title) ?>">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>

    <script src="js/click-toggle.js"></script>
    <script src="js/book-filters.js"></script>
    <script src="js/theme-selector.js"></script>
    <script src="js/delete.js"></script>
</body>

</html>