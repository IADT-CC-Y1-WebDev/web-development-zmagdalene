<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables Exercises - PHP Introduction</title>
    <link rel="stylesheet" href="/exercises/css/style.css">
</head>

<body>
    <div class="back-link">
        <a href="index.php">&larr; Back to PHP Introduction</a>
        <a href="/examples/01-php-introduction/01-variables.php">View Example &rarr;</a>
    </div>

    <h1>Variables Exercises</h1>

    <!-- Exercise 1 -->
    <h2>Exercise 1: Personal Information</h2>
    <p>
        <strong>Task:</strong>
        Create variables for your first name, last name, age, and city.
        Then output a sentence using these variables that says "My name
        is [first] [last], I am [age] years old and I live in [city]."
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $firstName = "Zoe";
        $lastName = "Mbikakeu";
        $age = "18";
        $city = "Dublin";
        $sentence = "My name is $firstName $lastName, I am $age years old and I live in $city.";
        echo $sentence;
        ?>
    </div>

    <!-- Exercise 2 -->
    <h2>Exercise 2: Shopping Calculator</h2>
    <p>
        <strong>Task:</strong>
        Create variables for three product prices and their quantities.
        Calculate the subtotal for each product (price × quantity), then
        calculate the total cost. Apply a 10% discount and display the
        final price.
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $price1 = 10;
        $price2 = 8;
        $price3 = 15;

        $quantity1 = 25;
        $quantity2 = 50;
        $quantity3 = 30;

        $sub1 = $price1 * $quantity1;
        $sub2 = $price2 * $quantity2;
        $sub3 = $price3 * $quantity3;

        $total = $sub1 + $sub2 + $sub3;
        $discount = 0.1;
        $final = $total * $discount;
        echo "€$final";
        ?>
    </div>

    <!-- Exercise 3 -->
    <h2>Exercise 3: User Status</h2>
    <p>
        <strong>Task:</strong>
        Create boolean variables for isStudent, hasDiscount, and isPremiumMember.
        Use the ternary operator to display "Yes" or "No" for each status.
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $isStudent = true;
        $hasDiscount = true;
        $isPremiumMember = false;
        $answer1;
        $answer2;
        $answer3;

        if ($isStudent === true) {
            $answer1 = "Yes";
        } else {
            $answer1 = "No";
        }

        if ($hasDiscount === true) {
            $answer2 = "Yes";
        } else {
            $answer2 = "No";
        }

        if ($isPremiumMember === true) {
            $answer3 = "Yes";
        } else {
            $answer3 = "No";
        }

        echo "Student: $answer1<br/>Discount: $answer2<br/>Premium Member: $answer3";

        ?>
    </div>

</body>

</html>