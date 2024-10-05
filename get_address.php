<?php

include_once 'config/connection.php';
include_once 'class/users.php';
include_once 'login.php';
include_once 'class/address.php';

header('Content-Type: application/json');

// getAddress
if (isset($_SESSION['user_id'])) {
    // die("User logged in");
    $user_id = $_SESSION['user_id'];
    $checkUserAddress = address::getAddress($user_id);

    if ($checkUserAddress !== false) {
        echo json_encode([$checkUserAddress]);
        exit();
    } else {
        echo json_encode(["error" => "Failed to fetch addresses"]);
        exit();
    }
} else {
    echo json_encode(["error" => "User not logged in"]);
    exit();
}
