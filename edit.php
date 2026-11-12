<?php

include "db.php";
include "header.php";
include "auth.php";

// fallback to 0 if id is not set

$id = $_GET['id'] ?? 0;

$sql = $conn->prepare("SELECT * FROM results WHERE id = $id");

$sql->execute();

$row = $sql->get_result()->fetch_assoc();

// Check if record exists

if (!$row) {

    echo "Record not found.";

    include "footer.php";

    exit();

}

// Get existing data

$student_name = $row['student_name'];
$matric_number = $row['matric_number'];
$subject = $row['subject'];
$test_1 = $row['test_1'];
$test_2 = $row['test_2'];
$final = $row['final'];

if (isset($_POST['update'])) {

    $student_name = $_POST['student_name'];
    $matric_number = $_POST['matric_number'];
    $subject = $_POST['subject'];
    $test_1 = $_POST['test_1'];
    $test_2 = $_POST['test_2'];
    $final = $_POST['final'];

    $total = $test_1 + $test_2 + $final;

    // Calculate Grade

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

    // Update Record

    $sql = $conn->prepare(
        "UPDATE results SET
        student_name = ?,
        matric_number = ?,
        subject = ?,
        test_1 = ?,
        test_2 = ?,
        final = ?,
        total = ?,
        grade = ?
        WHERE id = ?"
    );

    $sql->bind_param(
        "sssddddsi",
        $student_name,
        $matric_number,
        $subject,
        $test_1,
        $test_2,
        $final,
        $total,
        $grade,
        $id
    );

    if ($sql->execute()) {

        header("Location: index.php");
        exit();

    }

}

$button_name = "update";
$button_value = "Update";

?>

<h2>Edit Result</h2>

<br>

<?php

include "form.php";

include "footer.php";

?>