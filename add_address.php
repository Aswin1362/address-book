<?php

include_once 'config/connection.php';
include_once 'class/users.php';
include_once 'login.php';
include_once 'class/address.php';

// addAddress
if (isset($_POST['address'])) {
    $user_id = $_SESSION['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $addAddress = new address($user_id, $username, $email, $phone);

    if ($addAddress->addAddress() !== false) {
        echo "Address Added, echo from address.php";
        header("Location: home_page.html");
    } else {
        echo "Address Not Added, echo from address.php";
    }
}
