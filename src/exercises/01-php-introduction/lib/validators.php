        <?php
        // TODO: Write your solution here
        $email = "n00256791@iadt.ie";
        function isValidEmail($email)
        {
            if ($email) {
                echo "Valid Email<br/>$email: Yes<br/>";
            } else {
                echo "Valid Email<br/>$email: No<br/>";
            }
        }

        isValidEmail($email);
        ?>