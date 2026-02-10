<?php
namespace College;

require_once __DIR__ . '/Student.php';

class Undergrad extends Student
{
    protected $course;
    protected $year;

    public function __construct($name, $number, $course, $year)
    {

        parent::__construct($name, $number);

        $this->course = $course;
        $this->year = $year;
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function __toString()
    {
        return "Undergrad: " . $this->getName() . " (" . $this->getNumber() . "), " . $this->getCourse() . ", " . $this->getYear() . " year<br/>";
        return parent::__toString();
    }

    // public function display()
    // {
    //     parent::__toString();
    //     echo "Course: " . $this->getCourse() . "<br/>Year: " . $this->getYear() . "<br/>";
    // }
}
?>
