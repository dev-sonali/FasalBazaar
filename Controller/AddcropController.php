<?php
include '../model/FarmerModelImpl.php';

//Retrieve data that coming from the Addcrop page
$name = $_POST["name"];
$contact = $_POST["contact"];
$email = $_POST["email"];

$crop_name = $_POST["crop"];
$crop_type = $_POST["type"];
$quantity = $_POST["quantity"];
$price = $_POST["rate"];
$farmerid = $_POST["farmerID"];

//Object of class FarmerModelImpl
$addcrop = new FarmerModelImpl();

//Calling FarmerModelImpl addCrop method with required data.
$addcrop->addCrop($crop_name, $crop_type, $quantity, $price, $farmerid);

//Redirect back to the Farmer Home Page.
header("location: ../view/FarmerHome.php?name=$name&contact=$contact&email=$email");
