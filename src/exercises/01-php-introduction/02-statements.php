<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statements Exercises - PHP Introduction</title>
    <link rel="stylesheet" href="/exercises/css/style.css">
</head>

<body>
    <div class="back-link">
        <a href="index.php">&larr; Back to PHP Introduction</a>
        <a href="/examples/01-php-introduction/02-statements.php">View Example &rarr;</a>
    </div>

    <h1>Statements Exercises</h1>

    <!-- Exercise 1 -->
    <h2>Exercise 1: Age Classifier</h2>
    <p>
        <strong>Task:</strong>
        Create a variable for age. Use if/else statements to classify and
        display the age group: "Child" (0-12), "Teenager" (13-19), "Adult"
        (20-64), or "Senior" (65+).
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $age = 18;
        $group;

        if ($age > 0 && $age <= 12) {
            $group = "Child";
        } else if (
            $age > 12 && $age <= 19
        ) {
            $group = "Teenager";
        } else if (
            $age > 19 && $age <= 64
        ) {
            $group = "Adult";
        } else {
            $group = "error";
        }
        echo "Age: $age<br/>Age group: $group";
        ?>
    </div>

    <!-- Exercise 2 -->
    <h2>Exercise 2: Day of the Week</h2>
    <p>
        <strong>Task:</strong>
        Create a variable for the day of the week (use a number 1-7). Use
        a switch statement to display whether it's a "Weekday" or "Weekend",
        and the day name.
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $days = [
            1,
            2,
            3,
            4,
            5,
            6,
            7
        ];
        $day = $days[1];

        switch ($day) {
            case (1):
                echo "Weekday: Monday";
                break;
            case (2):
                echo "Weekday: Tuesday";
                break;
            case (3):
                echo "Weekday: Wednesday";
                break;
            case (4):
                echo "Weekday: Thursday";
                break;
            case (5):
                echo "Weekday: Friday";
                break;
            case (6):
                echo "Weekend: Saturday";
                break;
            case (7):
                echo "Weekend: Sunday";
                break;
            default:
                echo "error";
                break;
        }
        ?>
    </div>

    <!-- Exercise 3 -->
    <h2>Exercise 3: Multiplication Table</h2>
    <p>
        <strong>Task:</strong>
        Use a for loop to create a multiplication table for a number of your
        choice (1 through 10). Display each line in the format "X × Y = Z".
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $x;
        $y;
        $z;
        for ($i = 1; $i <= 10; $i++) {
            $x = 9;
            $y = $i;
            $z = $x * $y;
            echo "$x * $y = $z<br/>";
        }
        ?>
    </div>

    <!-- Exercise 4 -->
    <h2>Exercise 4: Countdown Timer</h2>
    <p>
        <strong>Task:</strong>
        Create a countdown from 10 to 0 using a while loop. Display each number,
        and when you reach 0, display "Blast off!"
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $x = 11;
        $count = 10;
        while ($x > 0 && $count > 0) {
            $x = $x - 1;
            $count--;
            echo "$x<br/>";
            if ($x === 1) {
                echo "Blast Off!";
            }
        }
        ?>
    </div>

</body>

</html>