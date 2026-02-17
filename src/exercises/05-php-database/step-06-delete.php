<?php
require_once __DIR__ . '/lib/config.php';
// =============================================================================
// Create PDO connection
// =============================================================================
try {
    $db = new PDO(DB_DSN, DB_USER, DB_PASS, DB_OPTIONS);
} catch (PDOException $e) {
    echo "<p class='error'>Connection failed: " . $e->getMessage() . "</p>";
    exit();
}
// =============================================================================
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/inc/head_content.php'; ?>
    <title>Exercise 6: DELETE Operations - PHP Database</title>
</head>

<body>
    <div class="container">
        <div class="back-link">
            <a href="index.php">&larr; Back to Database Access</a>
            <a href="/examples/05-php-database/step-06-delete.php">View Example &rarr;</a>
        </div>

        <h1>Exercise 6: DELETE Operations</h1>

        <h2>Task</h2>
        <p>Create a temporary book and then delete it.</p>

        <h3>Requirements:</h3>
        <ol>
            <li>Insert a new temporary book</li>
            <li>Display the book's ID</li>
            <li>Delete the book using a prepared statement</li>
            <li>Verify the deletion by trying to fetch it again</li>
        </ol>

        <h3>Your Solution:</h3>
        <div class="output">
            <?php
            // TODO: Write your solution here
            // 1. INSERT a temporary book
            // 2. Get the new ID
            // 3. Display "Created book with ID: X"
            // 4. DELETE FROM books WHERE id = :id
            // 5. Check rowCount()
            // 6. Try to fetch the book again to verify deletion
            $book = [
                'title' => 'My New Book',
                'author' => 'Zoe Mbikakeu',
                'publisher_id' => 2,
                'year' => 2026,
                'description' => 'Testing Exercise 6'
            ];

            function insertBook($db, $book)
            {
                $stmt = $db->prepare("INSERT INTO books (title, author, publisher_id, year, description) 
                VALUES (:title,:author,:publisher_id,:year,:description)");

                $status = $stmt->execute($book);

                if (!$status || $stmt->rowCount() !== 1) {
                    throw new Exception("Failed to insert book");
                }

                return $db->lastInsertId();
            }

            try {
                $checkStmt = $db->prepare("SELECT * FROM books WHERE title = :title AND author = :author AND publisher_id = :publisher_id AND year = :year AND description = :description");

                $checkStmt->execute($book);

                $existing = $checkStmt->fetch();

                if (!$existing) {
                    $newId = insertBook($db, $book);
                    echo "Book inserted successfully!<br>";
                    echo "Book ID: " . $newId;
                } else {
                    $newId = $existing['id'];
                    echo "Book already exists<br>";
                    echo "Book ID: " . $newId . "<br>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            try {

            $stmt = $db->prepare("DELETE FROM books WHERE id = :id");
            $status = $stmt->execute(['id' => 26]);
            $check = $stmt->fetch();

            if (!$status) {
                throw new Exception("Failed to delete book with ID: " . $id);
            } else if (!$check) {
                throw new Exception("Book no longer exists");
            }
             } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
             }

            ?>
        </div>
    </div>
</body>

</html>