<?php

session_start();

include "db.php";


if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
}

if ($username == "" || $password == "")
    $error = "Please enter both username and password.";
else {
    $sql = $conn->prepare("SELECT * FROM users WHERE name = '$username'");

    $sql->execute();

    $user = $sql->get_result()->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['name'] = $user['name'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}

?>


<h2>STUDENT GRADING</h2>

<h3>LOGIN</h3>

<form method="post">
    <label for="">Username:</label>
    <input style="width: 200px;" type="text" name="username" placeholder="NAK KENE AJAR KE?"><br><br>
    <label for="">Password:</label>
    <input style="width: 200px;" type="password" name="password" placeholder="PASSWORD BALABAK"><br><br>
    <button type="submit" name="login">Login</button>
</form>