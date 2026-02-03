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
                echo "Count:" . Student::getCount() . "<br/>";
                $studentInfo[] = $Student;
            } catch (Exception $e) {
                echo "*Error: " . $e->getMessage() . "*<br/><br/>";
            }
        }
        // echo "<pre>";
        // print_r($studentInfo);
        // echo "</pre>";

        $studentInfo[0] = null;
        $studentInfo[1] = null;
        $studentInfo[2] = null;
        $Student = null;

        echo "<br/><strong>All Students</strong><br/>";
        foreach (Student::findAll() as $students) {
            echo $students . "<br/>";
        }

        echo "<br/><strong>Looking for student n00357802</strong><br/>";
        $found = Student::findByNumber('n00357802');
        echo $found;

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