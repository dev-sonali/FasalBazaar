<?php
session_start();
include '../model/FarmerModelImpl.php';

$cropID =$_GET["cropId"];

$farmerObj = new FarmerModelImpl();
$farmerObj->deleteCrop($cropID);

$name = $_GET["name"];
$contact = $_GET["contact"];
$email = $_GET["email"];

header("location: ../view/ShowCrop.php?name=$name&contact=$contact&email=$email");
?>
