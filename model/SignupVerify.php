<?php
include '../dbUtility/DbConnection.php';
include '../LoggersFiles/includes.php';

$table = $_POST["user"];
$email = $_POST["email"];

$con = DbConnection::getConnection();
$sql ="UPDATE fasalbazaar.$table SET `status` = 'active' WHERE `$table`.`email` = '$email'";
if ($con->query($sql) == true) {  

    //calling log function to add the action to the log file
    $log = "New user with mail ID ($email) as ($table) verified the mail ID";
    logger($log);
    
    DbConnection::closeConnection();
    header("location: ../view/Login.html");
}
else{
    echo "ERROR: $sql <br> $con->error";
}

?>