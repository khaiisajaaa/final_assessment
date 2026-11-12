<?php

include "db.php";
include "auth.php";

if (isset($_POST['delete'])) {

    $id = $_POST['id'];

    $sql = $conn->prepare("DELETE FROM results WHERE id = ?");

    $sql->bind_param("i", $id);

    if ($sql->execute()) {

        header("Location: index.php");
        exit();

    }

}

?>