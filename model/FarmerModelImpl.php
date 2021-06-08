<?php
include '../dbUtility/DbConnection.php';
include 'FarmerModel.php';
include '../LoggersFiles/includes.php';

class FarmerModelImpl implements FarmerModel
{
    public function getFarmerProfile($farmerID)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query
        $sql = "SELECT name, contact, email FROM fasalbazaar.farmer WHERE farmerID = $farmerID;";

        //Execute sql query and retrieving the data that was coming from the database
        $data = $con->query($sql);

        //Closing database connection
        DbConnection::closeConnection();

        return $data;
    }

    public function addCrop($crop_name, $crop_type, $quantity, $price,$farmerid)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query for inserting the crop data into table
        $sql = "INSERT INTO fasalbazaar.crop (farmerID, crop, type, quantity, unitPrice) VALUES ('$farmerid','$crop_name', '$crop_type', '$quantity', '$price');";

        if ($con->query($sql) == true) {                //Execute the query and the checking whether it successfully executes or not

            //Calling log function to add the action to the log file
            $log = "Farmer with farmerId ($farmerid) added crop to the stock.";
            logger($log);

            //Closing database connection
            DbConnection::closeConnection();
            
        } else {
            echo "ERROR: $sql <br> $con->error";
        }
    }

    public function getCropData($farmerID)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query
        $sql = "SELECT cropID,crop,type,quantity,unitPrice FROM fasalbazaar.crop WHERE farmerID = $farmerID;";

        //Execute sql query and retrieving the data that was coming from the database
        $data = $con->query($sql);

        //Closing database connection
        DbConnection::closeConnection();

        return $data;
    }
    public function deleteCrop($cropID)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query
        $sql = "DELETE FROM fasalbazaar.crop WHERE cropID = $cropID";

        if ($con->query($sql) == true) {                //Execute the query and the checking whether it successfully executes or not

            //Calling log function to add the action to the log file
            $log = "Farmer deleted the crop with crop Id ($cropID).";
            logger($log);

            //Closing database connection
            DbConnection::closeConnection();
            
        } else {
            echo "ERROR: $sql <br> $con->error";
        }
    }
    public function updateFarmerProfile($name, $contact, $email, $current_password,$new_password,$farmerID)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query
        $sqlq = "SELECT password FROM fasalbazaar.farmer WHERE farmerID = $farmerID;";

        //Execute sql query and retrieving the data that was coming from the database
        $f_password = $con->query($sqlq)->fetch_assoc()["password"];

        if($f_password==$current_password)
        {
            $sql ="UPDATE fasalbazaar.farmer SET `name` = '$name', `contact` = '$contact', `email` ='$email', `password` = '$new_password' WHERE farmer.`farmerID` = '$farmerID'";
            if ($con->query($sql) == true) { 
                
                //Calling log function to add the action to the log file
                $log = "Farmer with farmerId ($farmerID) updated his/her profile.";
                logger($log);
                echo "Update Successful";
           }
            else{
                echo "ERROR: $sql <br> $con->error";
            }
        }
        DbConnection::closeConnection();

    }

    public function getRecentCrop($farmerID)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query
        $sql = "SELECT crop FROM fasalbazaar.crop WHERE farmerID = $farmerID;";

        //Execute sql query and retrieving the data that was coming from the database
        $data = $con->query($sql);

        //Closing database connection
        DbConnection::closeConnection();

        return $data;
    }
}
