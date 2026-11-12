<?php

include "header.php";
include "db.php";

if (isset($_POST['submit'])) {

    $student_name = $_POST['student_name'];
    $matric_number = $_POST['matric_number'];
    $subject = $_POST['subject'];
    $test_1 = $_POST['test_1'];
    $test_2 = $_POST['test_2'];
    $final = $_POST['final'];

    $total = $test_1 + $test_2 + $final;

    // 80-100 = A, 70-79 = B, 60-69 = C, 50-59 = D, <50 = F

    if ($total >= 80) {
        $grade = 'A';
    } elseif ($total >= 70) {
        $grade = 'B';
    } elseif ($total >= 60) {
        $grade = 'C';
    } elseif ($total >= 50) {
        $grade = 'D';
    } else {
        $grade = 'F';
    }

    $sql = $conn->prepare(
        "INSERT INTO results
        (student_name, matric_number, subject, test_1, test_2, final, total, grade)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $sql->bind_param(
        "sssdddds",
        $student_name,
        $matric_number,
        $subject,
        $test_1,
        $test_2,
        $final,
        $total,
        $grade
    );

    if ($sql->execute()) {

        header("Location: index.php");
        exit();

    }

}

$student_name = "";
$matric_number = "";
$subject = "";
$test_1 = "";
$test_2 = "";
$final = "";

$button_name = "submit";
$button_value = "Submit";

?>

<h2>ADD RESULTS</h2>

<br>

<?php

include "form.php";

include "footer.php";

?>