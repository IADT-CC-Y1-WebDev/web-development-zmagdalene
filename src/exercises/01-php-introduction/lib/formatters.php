        <?php
        // TODO: Write your solution here
        $number = "+35387121454";
        function formatPhoneNumber($number)
        {
            $newNum = substr($number, 4, strlen($number));
            echo "Number: $newNum";
        }

        formatPhoneNumber($number);
        ?>