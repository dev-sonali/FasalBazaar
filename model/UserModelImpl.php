<?php
include '../dbUtility/DbConnection.php';
include 'UserModel.php';
include('../smtp/smtp/PHPMailerAutoload.php');
include '../LoggersFiles/includes.php';

class UserModelImpl implements UserModel
{
    //Instance properties (variables)
    private $userID;
    private $status;

    public function Login($name, $password, $user)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        if ($user == "retailer") {
            //creating sql query for retailer
            $sql = "SELECT retailerID, status FROM fasalbazaar.retailer WHERE name = '$name' AND password = '$password';";

            //Execute sql query and retrieving the data that was coming from the database
            $data = $con->query($sql);
            while ($row = $data->fetch_assoc()) {
                $this->userID = $row["retailerID"];
                $this->status = $row["status"];
            }
        } else {
            //creating sql query for farmer
            $sql = "SELECT farmerID, status FROM fasalbazaar.farmer WHERE name = '$name' AND password = '$password';";

            //Execute sql query and retrieving the data as an associative array that was coming from the database
            $data = $con->query($sql);

            //Storing the values from the $data (associative array) to the instance properties
            while ($row = $data->fetch_assoc()) {
                $this->userID = $row["farmerID"];
                $this->status = $row["status"];
            }
        }

        //Closing database connection
        DbConnection::closeConnection();

        //Redirect to respective home page
        if ($this->userID != null) {                    //Checking the user is registered or not

            session_start();
            $_SESSION["userID"] = $this->userID;        //Storing user ID in the session 

            if ($this->status == "active") {            //Checking the user status
                if ($this->userID == 1) {               //Checking the user is an admin or farmer/retailer
                    
                    //Calling log function to add the action to the log file
                    $log = "Admin logged in.";
                    logger($log);

                    header("location: ../view/AdminFarmer.php");
                } else {
                    if ($user == "retailer") {          //Checking the user is a retailer or a farmer
                        
                        //Calling log function to add the action to the log file
                        $log = "Retailer with retailer ID ($this->userID) logged in.";
                        logger($log);

                        
                        header("location: ../view/RetailerHome.php");
                    } else {

                        //Calling log function to add the action to the log file
                        $log = "Farmer with Farmer ID ($this->userID) logged in.";
                        logger($log);

                        header("location: ../controller/ShowFarmerProfile.php");
                    }
                }
            } else {
                echo "Verify your account in order to login";
            }
        } else {
            header("location: ../view/login.html");
        }
    }

    public function SignUp($name, $contact, $email, $password, $user)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query for inserting the farmer/retailer data into their respective table
        $sql = "INSERT INTO fasalbazaar.$user (name, contact, email, password, status, profileImage) VALUES ('$name', $contact, '$email', '$password','deactive','profile.png');";

        if ($con->query($sql) == true) {                //Execute the query and the checking whether it successfully executes or not

            //calling log function to add the action to the log file
            $log = "New user with mail ID ($email) signed in as ($user) and status='deactive'";
            logger($log);

            //Closing database connection
            DbConnection::closeConnection();

            //Redirecting to Login page (View)
            header("location: ../view/Login.html");
        } else {
            echo "ERROR: $sql <br> $con->error";
        }

        //Getting the email Id at which we have to send the mail
        $to = $email;
        //subject of the mail 
        $subject = "Verification of the email ID.";
        //Text message to be send
        $txt = "<html></body><div><div>Dear $name,</div></br></br>
        <div style='padding-top:8px;'>Please verify your account.</div>
          <div>
            <form action='http://localhost/fasalBazaar/model/SignupVerify.php' method='POST'>
            <input type='hidden' name='email' value='$email'>
            <input type='hidden' name='user' value='$user'>
               <button style='background-color:#2e79ff; color:#fff; border-radius:2px;'>Verify</button> 
            </form>
           </div>
           </body>
           </html>";
        //mail function to send mail
        smtp_mailer($to, $subject, $txt);
    }

    function verifyPassword($user, $userID, $password)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query
        $sql = "SELECT password FROM fasalbazaar.$user WHERE $user" . "ID = $userID;";

        $flag = false;
        //Execute sql query and checking if the data is present in the database or not
        $row = $con->query($sql)->fetch_assoc();
        if ($row["password"] == $password) {
            $flag = true;
        }

        //Closing database connection
        DbConnection::closeConnection();

        return $flag;
    }
    function changePassword($user, $userID, $newPassword)
    {
        //Establish database connection
        $con = DbConnection::getConnection();

        //creating sql query
        $sql = "UPDATE fasalbazaar.$user SET $user.password = '$newPassword' WHERE $user" . "ID = $userID;";

        //Execute sql query and checking if the data is present in the database or not
        $data = $con->query($sql);

        //Closing database connection
        DbConnection::closeConnection();

        return $data;
    }
    
}
//Mailing function
function smtp_mailer($to, $subject, $msg)
{
$mail = new PHPMailer();
$mail->SMTPDebug  = 3;
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Username = "sonalirealc.sr10@gmail.com";
$mail->Password = "realcoderz00@";
$mail->SetFrom("SMTP_EMAIL_ID");
$mail->Subject = $subject;
$mail->Body = $msg;
$mail->AddAddress($to);
$mail->SMTPOptions = array('ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => false
));
if (!$mail->Send()) {
    echo $mail->ErrorInfo;
} else {
    return 'Sent';
}
}
