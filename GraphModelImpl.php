<?php
header('Content-Type: application/json');
include 'dbUtility/DbConnection.php';

$con = DbConnection::getConnection();

session_start();
$farmerID = $_SESSION["userID"];

$sqlQuery = "SELECT history.historyID,crop.crop,history.quantity FROM fasalbazaar.history, fasalbazaar.crop WHERE crop.cropID=history.cropID AND history.farmerID=$farmerID ORDER BY history.historyID";

$result = mysqli_query($con, $sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
