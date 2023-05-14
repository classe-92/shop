<?php
include __DIR__ . '/settings.php';

if (isset($_SESSION['userId'])) {
    header("location: index.php");
}

function login($email, $password, $conn)
{
    $md5password = md5($password);

    $stmt = $conn->prepare("SELECT `id`, `email` FROM `users` WHERE `email` = ? and `password` = ?");
    $stmt->bind_param('ss', $email, $md5password);

    $stmt->execute();

    $result = $stmt->get_result();

    $num_rows = $result->num_rows;

    if ($num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['userId'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        header("location: index.php");
    } //else {
    //     $_SESSION['userId'] = 0;
    //     $_SESSION['username'] = '';
    // }

}

function register($name, $surname, $email, $password, $conn)
{

}

// verifico se il form è stato correttamente inviato
if (isset($_POST['loginemail']) && isset($_POST['loginpassword'])) {
    login($_POST['loginemail'], $_POST['loginemail'], $conn);
}

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password'])) {
    register($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password'], $conn);
}