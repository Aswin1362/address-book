<?php

include_once 'class/users.php';

session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    if ((empty($username) || !isset($username)) || (empty($email) || !isset($email))) {
        header("Location: template_views/login.html");
        exit();
    }

    $fetchedUsers = users::checkUser($username, $email);

    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {

        echo "User has already logged in, echo from login.php";
        header("Location: template_views/home_page.html");
        exit();
    } else if ($fetchedUsers !== false) {
        $user = $fetchedUsers->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];

        echo "User Exists!, echo from login.php";
        header("Location: template_views/home_page.html");
        exit();
    } else {
        echo "User does not exist!";
        header("Location: template_views/register.html");
        exit();
    }
}
