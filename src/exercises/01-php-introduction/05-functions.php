<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions Exercises - PHP Introduction</title>
    <link rel="stylesheet" href="/exercises/css/style.css">
</head>

<body>
    <div class="back-link">
        <a href="index.php">&larr; Back to PHP Introduction</a>
        <a href="/examples/01-php-introduction/05-functions.php">View Example &rarr;</a>
    </div>

    <h1>Functions Exercises</h1>

    <!-- Exercise 1 -->
    <h2>Exercise 1: Temperature Converter</h2>
    <p>
        <strong>Task:</strong>
        Create a function called celsiusToFahrenheit() that takes a Celsius temperature as a parameter and returns the Fahrenheit equivalent. Formula: F = (C × 9/5) + 32. Test it with a few values.
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $C = 100;
        function celciusToFahrenheit($C)
        {
            $F = ($C * 9 / 5) + 32;
            echo $F;
        }
        celciusToFahrenheit($C);
        ?>
    </div>

    <!-- Exercise 2 -->
    <h2>Exercise 2: Rectangle Area</h2>
    <p>
        <strong>Task:</strong>
        Create a function called calculateRectangleArea() that takes width
        and height as parameters. It should return the area. If only one
        parameter is provided, assume it's a square (both dimensions equal).
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $H = 10;
        $W = 5;
        function calculateRectangleArea($H, $W)
        {
            if (isset($W) && isset($H)) {
                $A = $W * $H;
                echo $A;
            } else if (isset($W) && !isset($H)) {
                $A = $W * $W;
                echo $A;
            } else if (!isset($W) && isset($H)) {
                $A = $H * $H;
                echo $A;
            } else {
                echo "error";
            }
        }
        calculateRectangleArea($H, $W);
        ?>
    </div>

    <!-- Exercise 3 -->
    <h2>Exercise 3: Even or Odd</h2>
    <p>
        <strong>Task:</strong>
        Create a function called checkEvenOdd() that takes a number and returns
        "Even" if the number is even, or "Odd" if it's odd. Use the modulo
        operator (%).
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $N = 20;
        function checkEvenOdd($N)
        {
            if ($N % 2 === 0) {
                echo "Even";
            } else if ($N % 2 != 0) {
                echo "Odd";
            } else {
                echo "error";
            }
        }
        checkEvenOdd($N);
        ?>
    </div>

    <!-- Exercise 4 -->
    <h2>Exercise 4: Array Statistics</h2>
    <p>
        <strong>Task:</strong>
        Create a function called getArrayStats() that takes an array of numbers
        and returns an array with three values: minimum, maximum, and average.
        Use array destructuring to display the results.
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $nums = [50, 29, 24, 13, 45, 60, 35, 68, 72, 10];
        function getArrayStats($nums)
        {
            $min = min($nums);
            $max = max($nums);
            $avg = array_sum($nums) / count($nums);

            $values = [$min, $max, $avg];
            echo "Minimin: $values[0]<br/>Maximum: $values[1]<br/>Average: $values[2]";
        }
        getArrayStats($nums);
        ?>
    </div>

</body>

</html>