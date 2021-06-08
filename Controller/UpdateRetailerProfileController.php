<?php
session_start();
include '../model/RetailerModelImpl.php';

$retailerID = $_SESSION["userID"];
$name = $_POST["name"];
$contact = $_POST["contact"];
$email = $_POST["email"];

$retailerObj = new RetailerModelImpl();

$data = $retailerObj->updateRetailerProfile($retailerID, $name, $contact, $email);

if ($data) {
    header("location: ../view/RetailerHome.php");
}
