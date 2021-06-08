<?php
session_start();
include '../model/RetailerModelImpl.php';

$user = $_POST["user"];
$userID = $_SESSION["userID"];

if ($user == "retailer") {
    $retailerObj = new RetailerModelImpl();
    $retailerObj->removeProfileImage($userID);
}

header('location: ../view/RetailerHome.php');
