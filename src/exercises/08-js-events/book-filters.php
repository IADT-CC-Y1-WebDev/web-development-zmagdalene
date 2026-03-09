<?php
$books = [
    ['title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'year' => 1960],
    ['title' => '1984', 'author' => 'George Orwell', 'year' => 1949],
    ['title' => 'Pride and Prejudice', 'author' => 'Jane Austen', 'year' => 1813],
    ['title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'year' => 1925],
    ['title' => 'Harry Potter and the Philosophers Stone', 'author' => 'J.K. Rowling', 'year' => 1997],
    ['title' => 'Learning PHP, MySQL & JavaScript', 'author' => 'Robin Nixon', 'year' => 2018],
    ['title' => 'Clean Code', 'author' => 'Robert C. Martin', 'year' => 2008],
    ['title' => 'The Hobbit', 'author' => 'J.R.R. Tolkien', 'year' => 1937],
    ['title' => 'Dune', 'author' => 'Frank Herbert', 'year' => 1965],
    ['title' => 'The Catcher in the Rye', 'author' => 'J.D. Salinger', 'year' => 1951]
];
$authors = ['Harper Lee', 'George Orwell', 'Jane Austen', 'F. Scott Fitzgerald', 'J.K. Rowling', 'Robin Nixon', 'Robert C. Martin', 'J.R.R. Tolkien', 'Frank Herbert', 'J.D. Salinger'];
$years = [1960, 1949, 1813, 1925, 1997, 2018, 2008, 1937, 1965, 1951];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>08-1 – Book-style Filters with Events</title>
    <link rel="stylesheet" href="/exercises/css/style.css">
    <style>
        .filters {
            padding: 0.75rem 1rem;
            border-radius: 6px;
            border: 1px solid #ccc;
            background: #f5f5f5;
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            align-items: center;
        }

        .filters .input {
            display: flex;
            gap: 20px;
        }

        .filters .input label.filter-label {
            width: 108px;
            display: flex;
            justify-content: flex-end;
            color: #252525;
            font-weight: 900;
            font-size: 0.9rem;
        }

        .filters input,
        .filters select,
        .filters button {
            font-size: 0.9rem;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .card {
            padding: 1rem;
            border-radius: 8px;
            border: 1px solid #ccc;
            background: #f5f5f5;
        }

        .card.hidden {
            display: none;
        }

        .card h3 {
            margin-top: 0;
            margin-bottom: 0.25rem;
        }
    </style>
</head>

<body>

    <h1>Book Filters</h1>

    <form id="filters" class="filters">

        <div class="input">
            <label for="title_filter" class="filter-label">Title:</label>
            <div>
                <input type="text" id="title_filter" name="title_filter" placeholder="Part of Title">
            </div>
        </div>

        <div class="input">
            <label for="author_filter" class="filter-label">Author:</label>
            <div>
                <input type="text" id="author_filter" name="author_filter" placeholder="Author Name">
            </div>
        </div>

        <div class="input">
            <label for="year_filter" class="filter-label">Year:</label>
            <div>
                <select name="year_filter" id="year_filter">
                    <option value="">All Years</option>
                    <option value="before_2000">Before 2000</option>
                    <option value="after_2000">2000 and Later</option>
                </select>
            </div>
        </div>

        <div class="input">
            <label class="filter-label" for="sort_by">Sort:</label>
            <div>
                <select id="sort_by" name="sort_by">
                    <option value="title_asc">Title A–Z</option>
                    <option value="year_desc">Year (newest first)</option>
                    <option value="year_asc">Year (oldest first)</option>
                </select>
            </div>
        </div>

        <div class="input">
            <label class="filter-label" for="apply_filters">Actions</label>
            <div>
                <button type="button" id="apply_filters">Apply Filters</button>
                <button type="button" id="clear_filters">Clear Filters</button>
            </div>
        </div>

    </form>

    <div id="book_cards" class="cards">
        <?php foreach ($books as $book): ?>
            <div class="card"
                data-title="<?= htmlspecialchars($book['title']) ?>"
                data-author="<?= htmlspecialchars($book['author']) ?>"
                data-year="<?= htmlspecialchars($book['year']) ?>">
                <h3><?= htmlspecialchars($book['title']) ?></h3>
                <p><?= htmlspecialchars($book['author']) ?> · (<?= (int) $book['year'] ?>)</p>
            </div>
        <?php endforeach; ?>
    </div>


    <script src="book-filters.js"></script>
</body>

</html>