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
    echo "welcome to signup funtion";
}
function login($conn) {}
function logout($conn) {}
function update($conn) {}
function unSubscibe($conn) {}

// php -S localhost:8080 -t backend