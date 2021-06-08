<?php
interface RetailerModel
{
    public function getRetailerProfile($retailerID);
    public function updateRetailerProfile($retailerID, $name, $contact, $email);
    public function uploadProfileImage($retailerID, $image);
    public function removeProfileImage($retailerID);
    public function buyCrop($retailerID, $farmerID, $cropID, $quantity, $total);
    public function purchaseHistory($retailerID);
    public function getCrop($type, $crop);
}
