<?php
require('routeros_api.class.php');

// Function to generate random strings for username and password
function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $API = new RouterosAPI();

    $host = '192.168.88.1'; // MikroTik IP address
    $username = 'admin'; // MikroTik username
    $password = 'password'; // MikroTik password

    // Generate random username and password
    $user = generateRandomString();
    $pass = generateRandomString();
    $profile = $_POST['profile'];
    $limit_uptime = $_POST['limit_uptime'];

    if ($API->connect($host, $username, $password)) {
        try {
            $API->comm("/ip/hotspot/user/add", array(
                "name"     => $user,
                "password" => $pass,
                "profile"  => $profile,
                "limit-uptime" => $limit_uptime
            ));

            $message = "User created successfully\nUsername: $user\nPassword: $pass";
        } catch (Exception $e) {
            $message = 'Error: ' . $e->getMessage();
        }

        $API->disconnect();

    } else {
        $message = "Failed to connect to MikroTik";
    }

    header("Location: index.php?message=" . urlencode($message));
    exit();
}
?>
