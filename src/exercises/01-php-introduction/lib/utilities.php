 <?php
    // TODO: Write your solution here
    $text = "Hello, and welcome to my website!";
    $length = 24;
    $amount = 50;
    $year = "2026";

    function truncate($text, $length)
    {
        $truncated = substr($text, 0, $length);
        echo "$truncated...<br/>";
    }

    function formatPrice($amount)
    {
        echo "Amount: €$amount<br/>";
    }

    function getCurrentYear()
    {
        global $year;
        echo "Year: $year";
    }

    truncate($text, $length);
    formatPrice($amount);
    getCurrentYear();
    ?>