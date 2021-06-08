<?php
include 'AdminModel.php';
include '../dbUtility/DbConnection.php';
include '../LoggersFiles/includes.php';

class AdminModelImpl implements AdminModel
{
    public function ViewTotalUser_Activeuser()
    {

        $con = DbConnection::getConnection();
        $sql = "SELECT * FROM fasalbazar.farmer,retailer;";
        $sql1 = "SELECT * FROM fasalbazaar.farmer,retailer WHERE status = 'active';";
        $result1 = $con->query($sql);
        $result2 = $con->query($sql1);

        DbConnection::closeConnection();

        $count = 0;
        $active = 0;
        while ($result1->fetch_assoc) {
            $count++;
        }
        while ($result2->fetch_assoc) {
            $active++;
        }

         //Calling log function to add the action to the log file
         $log = "Admin viewed the active user and total user";
         logger($log);

        $arr = array('$count', '$active');
        return $arr;
    }
    public function ViewFarmerData()
    {
        if (function_exists("info") == TRUE) {
            // info("INFO: Inside the AdminModel & caliing Farmer Data to show list of farmers");
        }

        $con = DbConnection::getConnection();
        $sql = "SELECT farmerID,name,contact,email,status FROM fasalbazaar.farmer";
        $result = $con->query($sql);
         //Calling log function to add the action to the log file
         $log = "Farmer data retrieved by the admin";
         logger($log);
        DbConnection::closeConnection();
        return $result;
    }
    public function ViewRetailerData()
    {
        // Logger::_info("Inside ViewRetailerData method of AdminModelImpl.");

        $con = DbConnection::getConnection();
        $sql = "SELECT  retailerID,name,contact,email,status FROM fasalbazaar.retailer;";
        $result = $con->query($sql);

         //Calling log function to add the action to the log file
         $log = "Retailer data retrieved by the admin";
         logger($log);

        DbConnection::closeConnection();

        // Logger::_info("Return the Farmer Data.");
        return $result;
    }
    public function DeleteFarmer($farmerID)
    {

        $con = DbConnection::getConnection();
        $sql = "DELETE FROM fasalbazaar.farmer WHERE farmerID=$farmerID;";
        $result = $con->query($sql);

        //Calling log function to add the action to the log file
        $log = "Admin deleted the farmer with farmer Id ($farmerID)";
        logger($log);

        DbConnection::closeConnection();
        return $result;
    }
    public function DeleteRetailer($retailerID)
    {

        $con = DbConnection::getConnection();
        $sql = "DELETE FROM fasalbazaar.retailer WHERE retailerID=$retailerID;";
        $result = $con->query($sql);

        //Calling log function to add the action to the log file
        $log = "Admin deleted the retailer with retailer Id ($retailerID)";
        logger($log);

        DbConnection::closeConnection();
        return $result;
    }
    public function ViewHistory()
    {
        $con = Dbconnection::getConnection();
        $sql = "SELECT farmer.name,retailer.name,crop.crop,history.quantity,history.totalPrice FROM fasalbazaar.farmer,fasalbazaar.retailer,fasalbazaar.crop,fasalbazaar.history WHERE farmer.farmerID=history.farmerID AND retailer.retailerID=history.retailerID AND crop.cropID=history.cropID;";
        $result = $con->query($sql);

        //Calling log function to add the action to the log file
        $log = "History data retrieved by the admin";
        logger($log);

        DbConnection::closeConnection();
        return $result;
    }
    public function ViewCrop()
    {
        $con = DbConnection::getConnection();
        $sql = "SELECT farmer.name, crop.crop, crop.type, crop.quantity, crop.unitPrice FROM fasalbazaar.crop ,fasalbazaar.farmer WHERE farmer.farmerID=crop.farmerID;";
        $result = $con->query($sql);

        //Calling log function to add the action to the log file
        $log = "Crop data retrieved by the admin";
        logger($log);

        DbConnection::closeConnection();
        return $result;
    }
};
