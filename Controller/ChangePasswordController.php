<?php
session_start();
include '../model/UserModelImpl.php';

$userID = $_SESSION["userID"];
$user = $_POST["user"];
$lastPassword = $_POST["lastPassword"];
$newPassword = $_POST["newPassword"];

//Creating UserModelImpl object
$userObj = new UserModelImpl();

$flag = $userObj->verifyPassword($user, $userID, $lastPassword);

if ($flag) {
    $data = $userObj->changePassword($user, $userID, $newPassword);
    if ($data) {
        echo "Password has been changed.";
    } else {
        echo "Something went wrong...";
    }
} else {
    echo "Last password is incorrect.";
}
