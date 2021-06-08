<?php
interface FarmerModel
{
    public function getFarmerProfile($farmerID);
    public function addCrop($crop_name, $crop_type, $quantity, $price,$farmerid);
    public function getCropData($farmerID);
    public function deleteCrop($cropID);
    public function updateFarmerProfile($name, $contact, $email, $current_password,$new_password,$farmerID);
    public function getRecentCrop($farmerID);
}
