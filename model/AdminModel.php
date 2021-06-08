<?php
interface AdminModel
{
    public function ViewTotalUser_Activeuser();
    public function ViewFarmerData();
    public function ViewRetailerData();
    public function DeleteFarmer($farmerID);
    public function DeleteRetailer($retailerID);
    public function ViewHistory();
    public function ViewCrop();
    
    
}
?>