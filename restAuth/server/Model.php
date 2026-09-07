<?php

header('Access-Control-Allow-Origin: *');
include_once "./db.php";

// 
if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['crud_req'] == "signup")
    signup($conn);

// 

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['crud_req'] == "login")
    login($conn);

// 
if ($_SERVER['REQUEST_METHOD'] == "GET")
    logout($conn);

// 
if ($_SERVER['REQUEST_METHOD'] == "PATCH")
    update($conn);

// 
if ($_SERVER['REQUEST_METHOD'] == "DELETE")
    unSubscibe($conn);



function signup($conn)
{
    // echo "welcome to signup funtion";
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $rPwd = $_POST['rPwd'];

    if (empty($fName) || empty($lName) || empty($userName) || empty($email) || empty($pwd) || empty($rPwd)) {
        http_response_code(400);
        echo "All fields are mandatory!!";
    }
    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Invalid email address!";
        exit();
    }
    if ($pwd != $rPwd) {
        http_response_code(400);
        echo "Password are not matched!!";
        exit();
    }

    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $rPwd = $pwd;

    $sql = "INSERT INTO users (first_name,last_name,user_name, email, password, r_password) VALUES (?,?,?,?,?,?);";

    $stmt =  $conn->stmt_init();

    if ($stmt->prepare($sql)) {
        http_response_code(200);
        echo "You have successfully registered!";
        exit();
    }
    $stmt->bind_param('ssssss', $fName, $lName, $userName, $email, $pwd, $rPwd);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        http_response_code(200);
        echo "You have successfully registered!";
        exit();
    } else {
        http_response_code(400);
        echo "Something went wrong.";
    }
}
function login($conn) {}
function logout($conn) {}
function update($conn) {}
function unSubscibe($conn) {}

// php -S localhost:8080 -t server
