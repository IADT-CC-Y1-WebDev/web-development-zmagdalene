        <?php
        // TODO: Write your solution here
        class Student
        {
            protected $name;
            protected $number;
            public function __construct($name, $number)
            {
                $this->name = $name;
                $this->number = $number;

                echo "<br/>Creating Student -> $this->name<br/>";

                if (empty($number)) {
                    throw new Exception("Student number cannot be empty!");
                }
            }

            public function getName()
            {
                return $this->name;
            }

            public function getNumber()
            {
                return $this->number;
            }

            public function __toString()
            {
                return "Student: " . $this->getName() . " (" . $this->getNumber() . ")";
            }

            public function display()
            {
                echo "Name: " . $this->getName() . "<br/>Number: " . $this->getNumber() . "<br/>Student " . $this->getName() . " has number " . $this->getNumber() . "<br/>" . $this->__toString() . "<br/>";
            }

            public function __destruct()
            {
                echo "<br/>Student $this->name has left the system<br>";
            }
        }

        $students = [
            ["Zoe Mbikakeu", "n00256791"],
            ["Zoe Magdalene", "n00145680"],
            ["Magdalene Mbikakeu", "n00357802"],
            ["Anne Shirley", ""]
        ];

        $studentInfo = [];

        foreach ($students as $data) {
            try {
                $Student = new Student($data[0], $data[1]);
                $Student->display();
                $studentInfo[] = $Student;
            } catch (Exception $e) {
                echo "*Error: " . $e->getMessage() . "*<br/>";
            }
        }
        // echo "<pre>";
        // print_r($studentInfo);
        // echo "</pre>";

        $studentInfo[0] = null;
        $studentInfo[1] = null;
        $studentInfo[2] = null;
        $Student = null;

        /*try {
            $Student01 = new Student("Zoe Mbikakeu", "n00256791");
            $Student01->display();
            $Student02 = new Student("Zoe Magdalene", "n00145680");
            $Student02->display();
            $Student03 = new Student("Magdalene Mbikakeu", "n00357802");
            $Student03->display();
            $Student04 = new Student("Anne Shirley", "");
            $Student04->display();
            $Student05 = null;
        } catch (Exception $e) {
            echo "*Error: " . $e->getMessage() . "*<br/><br/>";
        }*/

        //echo $Student->name;
        //echo $Student->number;
        ?>