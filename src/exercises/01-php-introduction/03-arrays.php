<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays Exercises - PHP Introduction</title>
    <link rel="stylesheet" href="/exercises/css/style.css">
</head>

<body>
    <div class="back-link">
        <a href="index.php">&larr; Back to PHP Introduction</a>
        <a href="/examples/01-php-introduction/03-arrays.php">View Example &rarr;</a>
    </div>

    <h1>Arrays Exercises</h1>

    <!-- Exercise 1 -->
    <h2>Exercise 1: Favorite Movies</h2>
    <p>
        <strong>Task:</strong>
        Create an indexed array with 5 of your favorite movies. Use a for
        loop to display each movie with its position (e.g., "Movie 1:
        The Matrix").
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $movies = ["Train To Busan", "The Dark Knight", "Nightcrawler", "Fractured", "Prisoners"];

        for ($i = 0; $i != count($movies); $i++) {
            echo "Movie " . ($i + 1) . ": " . $movies[$i] . "</br>";
        }
        //echo "Movie 1: $movies[0]<br/>Movie 2: $movies[1]<br/>Movie 3: $movies[2]<br/>Movie 4: $movies[3]<br/>Movie 5: $movies[4]<br/>";
        ?>
    </div>

    <!-- Exercise 2 -->
    <h2>Exercise 2: Student Record</h2>
    <p>
        <strong>Task:</strong>
        Create an associative array for a student with keys: name, studentId,
        course, and grade. Display this information in a formatted sentence.
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $student01 = ["name" => "Zoe Mbikakeu", "studentId" => "n00256791", "course" => "Creative Computing", "grade" => "A"];
        echo "Student01<br/> Name = $student01[name]<br/>StudentId = $student01[studentId]<br/>Course = $student01[course]<br/>grade = $student01[grade]";
        ?>
    </div>

    <!-- Exercise 3 -->
    <h2>Exercise 3: Country Capitals</h2>
    <p>
        <strong>Task:</strong>
        Create an associative array with at least 5 countries as keys and their
        capitals as values. Use foreach to display each country and capital
        in the format "The capital of [country] is [capital]."
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $countries = ["Kenya" => "Nairobi", "Germany" => "Berlin", "Japan" => "Tokyo", "Brazil" => "Rio", "Ireland" => "Dublin"];

        foreach ($countries as $key => $value) {
            echo "The capital of $key is $value.<br/>";
        }
        ?>
    </div>

    <!-- Exercise 4 -->
    <h2>Exercise 4: Menu Categories</h2>
    <p>
        <strong>Task:</strong>
        Create a nested array representing a restaurant menu with at least
        2 categories (e.g., "Starters", "Main Course"). Each category should
        have at least 3 items with prices. Display the menu in an organized
        format.
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here
        $menu = [
            "Starters" => ["Caesar Salad" => "€7.50", "Nachos" => "€9", "Chicken wings" => "€9.80"],
            "Main Course" => ["Roasted Turkey and Gravy" => "€19", "Salmon and Peas" => "€16", "Plant-Based Veggie Burger" => "€18"],
            "Desserts" => ["Chocolate Fudge Cake" => "€14", "Deep Filled Apple Pie" => "€12", "Fruit and Ice Cream Sundae" => "€10"]
        ];
        echo "Menu<br/>__________________";
        foreach ($menu as $category => $items) {
            echo "<br/>$category<br/>";
            foreach ($items as $items => $price) {
                echo "$items: $price<br/>";
            }
        }
        ?>
    </div>

</body>

</html>