<?php
include '../model/AdminModelImpl.php';

$st=$_POST['Rid'];
$obj=new AdminModelImpl();
$data=$obj-> DeleteRetailer($st);
header("location:../view/AdminRetailer.php");
