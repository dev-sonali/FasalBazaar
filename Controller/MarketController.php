<?php
session_start();
include '../model/RetailerModelImpl.php';

$retailerID = $_SESSION["userID"];
$farmerID = $_POST["farmerID"];
$farmerName = $_POST["farmerName"];
$farmerContact = $_POST["farmerContact"];
$farmerEmail = $_POST["farmerEmail"];
$cropID = $_POST["cropID"];
$crop = $_POST["crop"];
$quantity = $_POST["quantity"];
$rate = $_POST["rate"];
$type = $_POST["type"];

$total = $quantity * $rate;


$retailerObj = new RetailerModelImpl();

$data = $retailerObj->buyCrop($retailerID, $farmerID, $cropID, $quantity, $total);

header("location: ../view/Receipt.php?farmerName=$farmerName&farmerContact=$farmerContact&farmerEmail=$farmerEmail&crop=$crop&type=$type&quantity=$quantity&rate=$rate&total=$total&flag=1");
