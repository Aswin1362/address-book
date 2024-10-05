<?php

include_once 'class/users.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    if ((empty($username) || !isset($username)) || (empty($email) || !isset($email))) {
        header("Location: register.html");
        exit();
    }
    
    $checkUser = new users($username, $email);

    if (users::checkUser($username, $email)) {
        echo "User Exists, echo from register.php";
    } else if ($checkUser->addUser()) {
        echo "User Added, echo from register.php";
    }

    header("Location: template_views/login.html");
}
