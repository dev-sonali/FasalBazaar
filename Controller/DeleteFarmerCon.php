<?php
include '../model/AdminModelImpl.php';

$farmerID=$_POST['Fid'];
$obj=new AdminModelImpl();
$data=$obj-> DeleteFarmer($farmerID);
header("location: ../view/AdminFarmer.php");
