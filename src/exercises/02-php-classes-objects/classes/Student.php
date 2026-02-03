<?php
class Student
{

    private static array $students = [];

    protected $name;
    protected $number;

    public function __construct($name, $number)
    {
        if (empty($number)) {
            throw new Exception("Student number cannot be empty!");
        }
        $this->name = $name;
        $this->number = $number;

        self::$students[$number] = $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public static function findByNumber($number)
    {
        return self::$students[$number] ?? null;
    }

    public static function findAll()
    {
        return self::$students;
    }

    public static function getCount()
    {
        return count(Student::findAll());
    }

    public function __toString()
    {
        return "Student: " . $this->getName() . " (" . $this->getNumber() . ")";
    }

    // public function display()
    // {
    //     echo "Name: " . $this->getName() . "<br/>Number: " . $this->getNumber() . "<br/>Student " . $this->getName() . " has number " . $this->getNumber() . "<br/>" . $this->__toString() . "<br/>";
    // }

    public function __destruct()
    {
        echo "<br/>Student $this->name has left the system<br>";
    }
}
        ?>