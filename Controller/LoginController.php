<?php
include '../model/UserModelImpl.php';

//Retrieve data that coming from the login page
$username = $_POST["Username"];
$password = $_POST["Password"];
$user = $_POST["User"];

//Creating UserModelImpl object
$userObj = new UserModelImpl();

//Calling UserModelImpl Login method with username and password parameters.
$userObj->Login($username, $password, $user);
