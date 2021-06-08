<?php
session_start();
include '../model/RetailerModelImpl.php';

$retailerID = $_SESSION["userID"];

$retailerObj = new RetailerModelImpl();

$data = $retailerObj->getRetailerProfile($retailerID);

$name;
$contact;
$email;
$profileIngStatus;

while ($row = $data->fetch_assoc()) {
    $name = $row["name"];
    $contact = $row["contact"];
    $email = $row["email"];
    $profileImage = $row["profileImage"];
}

header("location: ../view/RetailerProfile.php?name=$name&contact=$contact&email=$email&img=$profileImage");
?>