<?php
session_start();
if ($_SESSION["userID"]) {

  include '../model/FarmerModelImpl.php';
  $farmerID = $_SESSION["userID"];

  $name = $_GET["name"];
  $contact = $_GET["contact"];
  $email = $_GET["email"];

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <style>
      /* * {
        border: 1px solid red;
      } */

      body {
        margin: 0px;
        padding: 0px;
        background-image: url("image/farmer3.webp");
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
      }

      /* nav-bar style */
      #navigation-bar {
        width: 100vw;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        background-color: #2c2f33;
        position: fixed;
        z-index: 1;
      }

      .nav-text {
        font-size: 25px;
        color: #fff;
      }

      #nav-fasalbazaar {
        display: flex;
        flex-direction: row;
        margin-top: 3px;
        margin-left: 5px;
      }

      #fasal {
        font-weight: lighter;
      }

      .nav-link {
        color: white;
      }

      /* main-container style */
      .container {
        max-width: 80%;
        padding: 34px;
        margin: auto;
        display: flex;
        justify-content: center;
      }

      .container h1 {
        text-align: center;
        font-family: 'Sriracha', cursive;
        font-size: 40px;
        color: rgb(17, 2, 2);
      }

      p {
        font-size: 17px;
        text-align: center;
        font-family: 'Sriracha', cursive;
      }

      input {
        border: 2px solid rgb(20, 2, 2);
        border-radius: 6px;
        outline: none;
        font-size: 16px;
        width: 100%;
        margin: 11px 0px;
        padding: 7px;
      }

      form {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }

      .bg {
        width: 100%;
        position: absolute;
        z-index: -1;
        opacity: 0.6;
      }

      .profile-card {
        background-color: #fff;
        border-radius: 20px;
        padding: 20px;
        margin-top: 30px;
        width: 40vw;
      }

      button {
        margin-top: 15px;
      }
    </style>
  </head>

  <body>
    <!--navBar-->
    <div id="navigation-bar">
      <div class="nav-item" id="nav-fasalbazaar">
        <h2 class="nav-text" id="fasal">fasal</h2>
        <h2 class="nav-text">Bazaar</h2>
        <img src="image/logo.png" width="35" height="35">
      </div>

      <ul class="nav justify-content-end" style="margin-right: 10px;">

        <li class="nav-item">
          <a class="nav-link" href="FarmerHome.php?name=<?php echo $name; ?>&contact=<?php echo $contact; ?>&email=<?php echo $email; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../controller/LogoutController.php">Logout</a>
        </li>

      </ul>
    </div>
    <!-- Input fields to take the input -->
    <div class="container">
      <div class="profile-card">
        <h1>Update Profile</h1>
        <form action="../controller/UpdateFarProController.php" method="POST">
          <table style="width:35vw;">
            <tr>
              <td>
                <h4>Name</h4>
              </td>
              <td>
                <h5><input type="text" name="name" value="<?php echo $name; ?>" required></h5>
              </td>
            </tr>
            <tr>
              <td>
                <h4>Contact</h4>
              </td>
              <td>
                <h5><input type="number" name="contact" min=6000000000 value="<?php echo $contact; ?>" required></h5>
              </td>
            </tr>
            <tr>
              <td>
                <h4>Email</h4>
              </td>
              <td>
                <h5><input type="text" name="email" value="<?php echo $email; ?>" required></h5>
              </td>
            </tr>
            <tr>
              <td>
                <h4>Current Password</h4>
              </td>
              <td>
                <h5><input type="password" name="c_password" placeholder="Current Password" required></h5>
              </td>
            </tr>
            <tr>
              <td>
                <h4>New Password</h4>
              </td>
              <td>
                <h5><input type="password" name="n_password" placeholder="New Password" required></h5>
              </td>
            </tr>
          </table>
          <input type="hidden" name="farmerID" value=<?php echo $farmerID; ?>>
          <button class="btn btn-success">Submit</button>
        </form>
      </div>

    </div>

  </body>

  </html>

<?php } else {
  header("location: Login.html");
} ?>