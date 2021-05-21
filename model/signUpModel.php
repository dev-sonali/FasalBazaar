<?php
include '../dbUtility/DbConnection.php';

class SignUpModel
{

    public function signUp($name,$number,$password,$email,$user)
    {
        //Getting the database connection
        $con = DbConnection::getConnection();   

        //Sending mail to user
        $to = "$email";
        echo $to;
        $subject = "Verification of the Email ID";
        $txt = "Please enter to verify your email ID and Sign Up successfully.";
        $headers = "From: webmaster@example.com";
        $send_contact=mail($to,$subject,$txt,$headers);
        echo $send_contact;

        //$headers = "From: $from";
        //mail($to,$subject,$txt,$headers);
        // Check, if message sent to your email
        if($send_contact){
        echo " Your Message has been sent";
        }
        else {
        echo "ERROR";
        }

        //SQL query to insert the data into the database table
        $sql = "INSERT INTO fasalbazaar.$user (u_name, email, phone_number,password,status) VALUES ('$name', '$email', $number, '$password','Deactive');";
        echo $sql;

        //Verify that the password contains any special character or not
        $specialChar = '/~|!|@|#|\$|%|\^|&|\*|\?/';
        if((preg_match($specialChar,$password)))
        {
            if($con->query($sql) == true)
            {
               echo "Successfully inserted";
            }
            else
            {
                echo "ERROR: $sql <br> $con->error";
            }
        }
        //If password does not contain any special character, it will through an error
        else
        {
             echo '<script> alert("Your password must have atleast one special character.")';
        }

         $con->close();

    }
}
?>