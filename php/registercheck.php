<?php

//startar sessionen
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];

//inkluderar anslutningen
include_once 'connect.php';

//förbereder uttryck
$stmt = $mysqli->prepare("INSERT INTO user (username, password, firstName, middleName, lastName) VALUES (?, ?, ?, ?, ?)");

//binder uttryck
$stmt->bind_param("sssss", $username, $password, $firstName, $middleName, $lastName);

//kör uttryck
$stmt->execute();

header('Location: login.html');

?>