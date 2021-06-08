<?php
session_start();
include '../model/FarmerModelImpl.php';

$farmerID = $_SESSION["userID"];

$farmerObj = new FarmerModelImpl();

$data = $farmerObj->getFarmerProfile($farmerID);

$name;
$contact;
$email;

while ($row = $data->fetch_assoc()) {
    $name = $row["name"];
    $contact = $row["contact"];
    $email = $row["email"];
}

header("location: ../view/FarmerHome.php?name=$name&contact=$contact&email=$email");
