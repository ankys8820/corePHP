<?php

$host = "localhost";
$user = "root";
$pwd = "";
$db = "restauth";


$conn = new mysqli($host, $user, $pwd, $db);

if ($conn->connect_errno) {
    http_response_code(400);
    header('Content-Type : text/plain');
    echo $conn->connect_error;
    exit();
}
