<?php
include '../dbUtility/DbConnection.php';
include 'RetailerModel.php';
include '../LoggersFiles/includes.php';

class RetailerModelImpl implements RetailerModel
{
    public function getRetailerProfile($retailerID)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query
        $sql = "SELECT name, contact, email, profileImage FROM fasalbazaar.retailer WHERE retailerID = $retailerID;";

        //Execute sql query and retrieving the data that was coming from the database
        $data = $con->query($sql);

        //Closing database connection
        DbConnection::closeConnection();

        return $data;
    }

    public function updateRetailerProfile($retailerID, $name, $contact, $email)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query
        $sql = "UPDATE fasalbazaar.retailer SET retailer.name = '$name', retailer.contact = $contact, retailer.email = '$email' WHERE retailerID = $retailerID;";

        //Execute sql query and retrieving the data that was coming from the database
        $data = $con->query($sql);

        //Calling log function to add the action to the log file
        $log = "Retailer with retailer ID ($retailerID) updated his/her profile.";
        logger($log);
        
        //Closing database connection
        DbConnection::closeConnection();

        return $data;
    }

    public function uploadProfileImage($retailerID, $image)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query
        $sql = "UPDATE fasalbazaar.retailer SET profileImage = '$image' WHERE retailerID = $retailerID;";

        //Execute sql query and retrieving the data that was coming from the database
        $data = $con->query($sql);

        //Calling log function to add the action to the log file
        $log = "Retailer with retailer ID ($retailerID) uploaded his/her profile image.";
        logger($log);

        //Closing database connection
        DbConnection::closeConnection();

        return $data;
    }

    public function removeProfileImage($retailerID)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query
        $sql = "UPDATE fasalbazaar.retailer SET profileImage = 'profile.png' WHERE retailerID = $retailerID;";

        //Execute sql query and retrieving the data that was coming from the database
        $data = $con->query($sql);

        //Calling log function to add the action to the log file
        $log = "Retailer with retailer ID ($retailerID) removed his/her profile image.";
        logger($log);

        //Closing database connection
        DbConnection::closeConnection();

        return $data;
    }

    public function buyCrop($retailerID, $farmerID, $cropID, $quantity, $total)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query
        $sql = "INSERT INTO fasalbazaar.history(farmerID, retailerID, cropID, quantity, totalPrice) VALUES($farmerID, $retailerID, $cropID, $quantity, $total);";
        $sql2 = "SELECT quantity FROM fasalbazaar.crop WHERE cropID =  $cropID;";

        $cropQuantity = $con->query($sql2)->fetch_assoc()["quantity"];

        $cropQuantity -= $quantity;

        $sql3 = "UPDATE fasalbazaar.crop SET quantity =  $cropQuantity WHERE cropID =  $cropID;";

        $con->query($sql3);

        //Execute sql query and retrieving the data that was coming from the database
        $data = $con->query($sql);

        //Calling log function to add the action to the log file
        $log = "Retailer with retailer ID ($retailerID) buy the crop ($cropID) from farmer ($farmerID).";
        logger($log);

        //Closing database connection
        DbConnection::closeConnection();
        return $data;
    }

    public function getCrop($type, $crop)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query
        $sql = "SELECT farmer.farmerID, farmer.name, farmer.contact, farmer.email, crop.cropID, crop.crop, crop.quantity, crop.unitPrice FROM fasalbazaar.farmer, fasalbazaar.crop WHERE crop.type = '$type' AND crop.crop = '$crop' AND farmer.farmerID = crop.farmerID;";

        //Execute sql query and retrieving the data that was coming from the database
        $data = $con->query($sql);

        //Closing database connection
        DbConnection::closeConnection();

        return $data;
    }

    public function purchaseHistory($retailerID)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query
        $sql = "SELECT farmer.name, farmer.contact, farmer.email, crop.crop, crop.type, crop.unitPrice, history.historyID, history.quantity, history.totalPrice FROM fasalbazaar.farmer, fasalbazaar.crop, fasalbazaar.history WHERE farmer.farmerID = history.farmerID AND crop.cropID = history.cropID AND retailerID = $retailerID;";

        //Execute sql query and retrieving the data that was coming from the database
        $data = $con->query($sql);

        //Calling log function to add the action to the log file
        $log = "Retailer with retailer ID ($retailerID) retrieved the history.";
        logger($log);

        //Closing database connection
        DbConnection::closeConnection();

        return $data;
    }
}
