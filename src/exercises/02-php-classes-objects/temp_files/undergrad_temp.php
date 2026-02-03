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