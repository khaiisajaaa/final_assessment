<?php

include "db.php";

$search = $_GET['search'] ?? '';

$like = "%$search%";

// $sql = $conn->prepare("SELECT * FROM results");

$sql = $conn->prepare("SELECT * FROM results WHERE student_name LIKE ? OR matric_number LIKE ? OR subject LIKE ?");

$sql->bind_param("sss", $like, $like, $like);

$sql->execute();

$result = $sql->get_result();

include "header.php";

include "auth.php";

?>

<h2>Student Records</h2>

<a href="add.php">+ Add Result</a>

<form method="get">
    <input type="text" name="search" placeholder="Search by name or id" value="<?php $search ?>">
    <button type="submit">Search</button>
    <a href="">Show All</a><br><br>
</form>

<a href="index.php">Show all</a>

<br><br>

<div>

    <table border="5" cellspacing="0" cellpadding="7">

        <tr>

            <th>No.</th>
            <th>Student Name</th>
            <th>Matric No.</th>
            <th>Subject</th>
            <th>Test 1 (20%)</th>
            <th>Test 2 (30%)</th>
            <th>Final (50%)</th>
            <th>Total (100%)</th>
            <th>Grade</th>
            <th>Actions</th>

        </tr>

        <?php

        $no = 1;

        while ($row = $result->fetch_assoc()) {

            echo "<tr>";

            echo "<td>" . $no++ . "</td>";

            echo "<td>" . $row['student_name'] . "</td>";

            echo "<td>" . $row['matric_number'] . "</td>";

            echo "<td>" . $row['subject'] . "</td>";

            echo "<td>" . $row['test_1'] . "</td>";

            echo "<td>" . $row['test_2'] . "</td>";

            echo "<td>" . $row['final'] . "</td>";

            echo "<td>" . $row['total'] . "</td>";

            echo "<td>" . $row['grade'] . "</td>";

            echo "<td>";

            echo "<button><a href='edit.php?id=" . $row['id'] . "'>Edit</a></button>";

            echo "<form method='POST' action='delete.php' style='display:inline;'>";

            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";

            echo "<button type='submit' name='delete'
            onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</button>";

            echo "</form>";

            echo "</td>";

            echo "</tr>";

        }

        ?>

    </table>

</div>

<?php

include "footer.php";

?>