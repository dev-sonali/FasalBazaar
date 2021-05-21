 <?php
 include '../model/signUpModel.php';

 //Getting the values from the textfiels to the variables
 $userName = $_POST["name"];
 $email = $_POST["email"];
 $number = $_POST["phone"];
 $password = $_POST["password"];
 $user =$_POST["user"];

//Creating object of class signUpModel to pass the values to the function signUp
 $sign_obj = new signUpModel();
 $sign_obj->signUp($userName,$number,$password,$email,$user); 

 ?>


