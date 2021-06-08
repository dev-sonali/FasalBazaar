<?php
include '../model/FarmerModelImpl.php';

//Retrieve data that coming from the UpdateFarmer page
$name = $_POST["name"];
$contact = $_POST["contact"];
$email = $_POST["email"];
$current_password = $_POST["c_password"];
$new_password = $_POST["n_password"];
$farmerID = $_POST["farmerID"];

//Object of class FarmerModelImpl
$updateFarmer = new FarmerModelImpl();

//Calling FarmerModelImpl updateFarmer method with required data.
$updateFarmer->updateFarmerProfile($name, $contact, $email, $current_password,$new_password,$farmerID);
    
?>
