 <?php
    // TODO: Write your solution here
    require_once __DIR__ . '/Student.php';
    require_once __DIR__ . '/Undergrad.php';

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

        // public function display()
        // {
        //     echo $this->__toString();
        // }
    }
    ?>