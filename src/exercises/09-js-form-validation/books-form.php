<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <link rel="stylesheet" href="/examples/css/style.css">
    <style>
        form {
            margin-top: 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            max-width: 520px;
        }

        .input {
            display: flex;
            gap: 20px;
        }

        .input label.form-label {
            width: 108px;
            display: flex;
            justify-content: flex-end;
            color: #252525;
            font-weight: 900;
            flex-shrink: 0;
        }

        .input>div {
            flex: 1;
        }

        label {
            font-weight: 600;
        }

        input,
        select,
        textarea {
            font-size: 1rem;
            padding: 0.35rem 0.5rem;
        }

        textarea {
            min-height: 80px;
            width: 100%;
            box-sizing: border-box;
        }

        .input .format-options label {
            font-weight: normal;
            margin-left: 0.25rem;
        }

        .error {
            color: #b00020;
            font-size: 0.85rem;
        }

        .input-error {
            border-color: #b00020;
            background: #fff5f5;
        }

        .error-summary {
            border-radius: 6px;
            border: 1px solid #b00020;
            background: #fff5f5;
            padding: 0.75rem 1rem;
            margin-bottom: 0.75rem;
        }

        #submit_btn {
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="back-link">
        <a href="index.php">&larr; Back to 09 Overview</a>
        <a href="/index.php">Back to Module Index</a>
    </div>

    <h1>Create Book</h1>

    <p>
        This example mimics the structure of the games create/edit form and uses
        reusable validation helpers. We will apply the same pattern to the books
        project.
    </p>

    <?php
    $publishers = [
        ['id' => 1, 'name' => 'Penguin Random House'],
        ['id' => 2, 'name' => 'HarperCollins'],
        ['id' => 3, 'name' => 'Simon & Schuster'],
        ['id' => 4, 'name' => 'Hachette Book Group'],
        ['id' => 5, 'name' => 'Macmillan Publishers'],
        ['id' => 6, 'name' => 'Scholastic'],
        ['id' => 7, 'name' => 'OReilly Media'],
    ];
    $formats = [
        ['id' => 1, 'name' => 'Hardcover'],
        ['id' => 2, 'name' => 'Paperback'],
        ['id' => 3, 'name' => 'Ebook'],
        ['id' => 4, 'name' => 'Audiobook'],
    ];
    ?>
    <form id="book_form" novalidate>
        <div id="error_summary_top" class="error-summary" style="display:none" role="alert"></div>

        <div class="form-group">
            <label class="form-label" for="title">Title:</label>
            <div>
                <input type="text" id="title" name="title" data-minlength="3" data-maxlength="255">
                <span id="title_error" class="error"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="author">Author:</label>
            <div>
                <input type="text" id="author" name="author" data-minlength="3" data-maxlength="255">
                <span id="author_error" class="error"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="year">Year:</label>
            <div>
                <input type="text" id="year" name="year" data-minlength="4" data-maxlength="4">
                <span id="year_error" class="error"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="publisher_id">Publisher:</label>
            <div>
                <select id="publisher_id" name="publisher_id">
                    <option value="">-- choose a publisher --</option>
                    <?php foreach ($publishers as $g): ?>
                        <option value="<?= (int) $g['id'] ?>"><?= htmlspecialchars($g['name']) ?></option>
                    <?php endforeach; ?>
                </select>
                <span id="publisher_id_error" class="error"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="description">Description:</label>
            <div>
                <textarea id="description" name="description" data-minlength="15"></textarea>
                <span id="description_error" class="error"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Formats:</label>
            <div class="format-options">
                <?php foreach ($formats as $f): ?>
                    <div>
                        <input type="checkbox" id="format_ids<?= (int) $f['id'] ?>" name="format_ids[]" value="<?= (int) $f['id'] ?>">
                        <label for="format_<?= (int) $f['id'] ?>"><?= htmlspecialchars($f['name']) ?></label>
                    </div>
                <?php endforeach; ?>
                <span id="format_ids_error" class="error"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="image">Image (required):</label>
            <div>
                <input type="file" id="image" name="image" accept="image/*">
                <span id="image_error" class="error"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label"></label>
            <div>
                <button id="submit_btn" type="submit">Store Book</button>
            </div>
        </div>
    </form>

    <script src="books-form.js"></script>
</body>

</html>