<?php
session_start();
include '../model/RetailerModelImpl.php';

$retailerID = $_SESSION["userID"];

//Retrieving the data that was coming from the ProfileImageModel
$profileImage = $_FILES["profileImage"];
$name = $_POST["name"];
$contact = $_POST["contact"];
$email = $_POST["email"];
// print_r($profileImage);

//Extracting the image meta date
$fileName = $profileImage["name"];          //File Name
$fileSize = $profileImage["size"];          //File Size
$fileType = $profileImage["type"];          //File Type (image/extention)
$fileTemp = $profileImage["tmp_name"];      //File Temporary Location
$fileError = $profileImage["error"];        //File Error (>0 represents error in the file)

//seperate the file name on the basis of period and store the data in $fileExt
$fileExt = explode('.', $fileName);

//Convert the last word (which is file extention) to lower case and store in the $fileActualExt
$fileActualExt = strtolower(end($fileExt));

//Creating an array of image extention that are allowed to upload
$extArray = array('jpg', 'jpeg', 'png');

if (in_array($fileActualExt, $extArray)) {      //Checking if the image extention is present in the extention array ($extArray) or not
    if ($fileError === 0) {                     //Checking error present in image meta data
        if ($fileSize <= 5000000) {             //Resticting Image size & checking
            $fileNewName = $name . $contact . '.' . $fileActualExt;         //Renaming the image file (e.g name8596741230.jpg)
            move_uploaded_file($fileTemp, '../view/profileImage/' . $fileNewName);    //Move the image from temporary location to specified location

            $retailerObj = new RetailerModelImpl();
            $retailerObj->uploadProfileImage($retailerID, $fileNewName);

            header("location: ../view/RetailerProfile.php?name=$name&contact=$contact&email=$email&img=$fileNewName");        //Redirect to testProfile.php (reload the frontend)
        } else {
            echo "Image size should be less than 5mb.";
        }
    } else {
        echo "Something went wrong!!!";
    }
} else {
    echo "Please choose the correct image. The extention of image should be either jpg, jpeg or png.";
}
