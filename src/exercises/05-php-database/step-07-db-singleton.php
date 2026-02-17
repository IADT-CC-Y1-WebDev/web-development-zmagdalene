<?php
require_once __DIR__ . '/lib/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '/inc/head_content.php'; ?>
    <title>Exercise 7: Database Singleton - PHP Database</title>
</head>

<body>
    <div class="container">
        <div class="back-link">
            <a href="index.php">&larr; Back to Database Access</a>
            <a href="/examples/05-php-database/step-07-db-singleton.php">View Example &rarr;</a>
        </div>

        <h1>Exercise 7: Database Singleton Class</h1>

        <h2>Task</h2>
        <p>Use the DB singleton class to get database connections.</p>

        <h3>Requirements:</h3>
        <ol>
            <li>Get a connection using <code>DB::getInstance()->getConnection()</code></li>
            <li>Execute a simple query to count books</li>
            <li>Prove it's a singleton by getting the instance twice and comparing</li>
        </ol>

        <h3>Your Solution:</h3>
        <div class="output">
            <?php
            // TODO: Write your solution here
            // 1. Get connection: $db = DB::getInstance()->getConnection();
            // 2. Execute: SELECT COUNT(*) as total FROM books
            // 3. Display the count
            // 4. Get DB::getInstance() twice and compare with ===
            // 5. Display whether they are the same instance
            $inst1 = DB::getInstance();
            $inst2 = DB::getInstance();

            if ($inst1 === $inst2) {
                echo "Same Instance, Singleton works!<br>";
            }

            $db1 = $inst1->getConnection();
            $db2 = $inst2->getConnection();

            if ($db1 === $db2) {
                echo "Same PDO Connection, Singleton works!";
            }

            $stmt1 = $db1->prepare("SELECT COUNT(*) as total FROM books");
            $stmt2 = $db2->prepare("SELECT COUNT(*) as total FROM books");
            $stmt1->execute();
            $stmt2->execute();
            $books1 = $stmt1->fetch();
            $books2 = $stmt2->fetch();
            echo "<p>Database 1 Total: " . $books1['total'] . "<br>Database 2 Total: " . $books2['total'] . "</p>";

            ?>
        </div>
    </div>
</body>

</html>