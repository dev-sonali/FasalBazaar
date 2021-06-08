<?php
include '../model/UserModelImpl.php';

//Retrieve data that coming from the Sign Up page
$name = $_POST["name"];
$contact = $_POST["contact"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$user = $_POST["user"];

//Checking password confirmation
if ($password == $confirmPassword) {

    //Pattern
    $specialChar = '/~|!|@|#|\$|%|\^|&|\*|\?/';

    //Checking if password has any special character or not (any one from the $specialChar)
    if ((preg_match($specialChar, $password))) {

        $signup = new UserModelImpl();

        //Calling UserModelImpl SignUp method with required data.
        $signup->SignUp($name, $contact, $email, $password, $user);
    } else {
        echo "Your password must have atleast one special character.";
    }
} else {
    echo "Password Confirmation doesn't match";
}
