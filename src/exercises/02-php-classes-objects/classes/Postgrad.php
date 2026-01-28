 <?php
    // TODO: Write your solution here
    require_once __DIR__ . '/Student.php';
    require_once __DIR__ . '/Undergrad.php';

    echo "<br/><strong>Postgraduate Students</strong><br/>______________________________<br/>";

    class Postgrad extends Student
    {
        protected $supervisor;
        protected $topic;

        public function __construct($name, $number, $supervisor, $topic)
        {
            parent::__construct($name, $number);

            $this->supervisor = $supervisor;
            $this->topic = $topic;
        }

        public function getSupervisor()
        {
            return $this->supervisor;
        }

        public function getTopic()
        {
            return $this->topic;
        }

        public function __toString()
        {
            return "Postgrad: " . $this->getName() . " (" . $this->getNumber() . "), Supervisor: " . $this->getSupervisor() . ", Topic: " . $this->getTopic() . "<br/>";
        }

        public function display()
        {
            echo $this->__toString();
        }
    }
    $postgrads = [["Clementine Lemons", "n00201454", "John Montayne", "UX Design"]];

    $postgradInfo = [];

    foreach ($postgrads as $data) {
        try {
            $Postgrad = new Postgrad($data[0], $data[1], $data[2], $data[3]);
            $Postgrad->display();
            $postgradInfo[] = $Postgrad;
        } catch (Exception $e) {
            echo "*Error: " . $e->getMessage() . "*<br/><br/>";
        }
    }

    $attendees = ["Student" => ["Albert Einstein", "n00111111"], "Undergrad" => ["Katniss Everdeen", "n00232475", "English + Equality Studies", "3rd"], "Postgrad" => ["Joyce Byers", "n00201375", "Grainne Caroll", "3D Animation"]];

    $attendeesInfo = [];

    // for ($i = 0; $i < count($attendees); $i++) {
    // }

    foreach ($attendees as $level => $info) {

        // $Student = new $level($info);
        // $Student->display();
        // foreach ($info as $item) {

        try {

            if ($level === "Student") {
                echo "<br/><strong>Students</strong><br/>______________________________<br/>";
                $attendee = new Student($info[0], $info[1]);
            } else if ($level === "Undergrad") {
                echo "<br/><strong>Undergraduates</strong><br/>______________________________<br/>";
                $attendee = new Undergrad($info[0], $info[1], $info[2], $info[3]);
            } else if ($level === "Postgrad") {
                echo "<br/><strong>Postgraduates</strong><br/>______________________________<br/>";
                $attendee = new Postgrad($info[0], $info[1], $info[2], $info[3]);
            } else {
                echo "*Invalid Attendee*";
            }

            $attendee->display();
            $attendeesInfo[] = $attendee;

            // $Student = new Student($data[0], $data[1]);
            // $Undergrad = new Undergrad($data[0], $data[1], $data[2], $data[3]);
            // $Postgrad = new Postgrad($data[0], $data[1], $data[2], $data[3]);
            // $Postgrad->display();
            // $postgradInfo[] = $Postgrad;
        } catch (Exception $e) {
            echo "*Error: " . $e->getMessage() . "*<br/><br/>";
        }
    }

    ?>