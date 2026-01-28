<?php
// TODO: Write your solution here
require_once __DIR__ . '/Student.php';

echo "<br/><strong>Undergraduate Students</strong><br/>______________________________<br/>";

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
        echo "Undergrad: " . $this->getName() . " (" . $this->getNumber() . "), " . $this->getCourse() . ", " . $this->getYear() . " year<br/>";
        return parent::__toString();
    }

    public function display()
    {
        parent::display();
        echo "Course: " . $this->getCourse() . "<br/>Year: " . $this->getYear() . "<br/>";
    }
}

$undergrads = [["Mat Pat", "n00223916", "Creative Computing", "3rd"], ["Will Byers", "n00245936", "Design For Film", "2nd"], ["Jane Hopper", "n00212715", "Applied Psychology", "4th"]];

$undergradInfo = [];

foreach ($undergrads as $data) {
    try {
        $Undergrad = new Undergrad($data[0], $data[1], $data[2], $data[3]);
        $Undergrad->display();
        $undergradInfo[] = $Undergrad;
    } catch (Exception $e) {
        echo "*Error: " . $e->getMessage() . "*<br/><br/>";
    }
}

$undergradInfo[0] = null;
$undergradInfo[1] = null;
$undergradInfo[2] = null;

$Undergrad = null;
?>
</div>