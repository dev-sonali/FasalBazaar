<?php
session_start();
if ($_SESSION["userID"]) {

  $name = $_GET["name"];
  $contact = $_GET["contact"];
  $email = $_GET["email"];
  $profileImage = $_GET["img"];
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Document</title>
    <style>
      /* *{
            border:1px solid red;
        } */
      body {
        margin: 0px;
        padding: 0px;
        background-image: url(image/pg.webp);
      }

      .card {
        border-radius: 30px;
        background-color: #f2f3f7;
        box-shadow: 6px 6px px #8e8e8e, -6px -6px 6px #fff;
      }

      #main {

        margin: 0px 20px 20px 20px;
        display: flex;
        flex-direction: column;
        padding: 20px;
      }

      #profile-data {
        margin-top: 15vh;
        margin-left: 6vw;
        width: 80vw;
        height: 70vh;
        display: flex;
        flex-direction: row;
        padding: 20px;

      }

      #img {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #fff;
      }

      #data {
        flex: 1.5;
        margin-left: 20px;
        text-align: center;
        background-color: #fff;
      }

      table {
        margin: 20px 0px 15px 50px;
      }

      table h3 {
        text-align: left;
      }

      .button {
        margin-bottom: 20px;
      }

      h1 {
        margin-top: 10px;
      }

      /*navbar style*/
      #navigation-bar {
        width: 100vw;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        background-color: #2c2f33;
        position: fixed;
        z-index: 1;
        ;
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
          <a class="nav-link" href="RetailerHome.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../controller/LogoutController.php">Logout</a>
        </li>

      </ul>
    </div>
    <div id="main">
      <div class="card" id="profile-data">

        <div class="card" id="img">
          <img src="profileImage/<?php echo $profileImage; ?>?<?php mt_rand(); ?>" width="350" heigth="300">
        </div>

        <div class="card" id="data">
          <h1> Profile </h1>
          <table align="center" width=100%>
            <tr>
              <td>
                <h3>Name</h3>
              <td>
              <td>
                <h3><?php echo $name; ?></h3>
              <td>
            </tr>
            <tr>
              <td>
                <h3>Contact</h3>
              <td>
              <td>
                <h3><?php echo $contact; ?></h3>
              <td>
            </tr>
            <tr>
              <td>
                <h3>Email</h3>
              <td>
              <td>
                <h3><?php echo $email; ?></h3>
              <td>
            </tr>

          </table>
          <table class="button">
            <tr>
              <td>
                <a href="UpdateRetailerProfile.php?name=<?php echo $name; ?>&contact=<?php echo $contact; ?>&email=<?php echo $email; ?>&img=<?php echo $profileImage; ?>">
                  <button type="submit" class="btn btn-success">Update</button>
                </a>
              <td>
              <td>
                <a href="RetailerChangePassword.php?img=<?php echo $profileImage; ?>">
                  <button type="submit" class="btn btn-success">Change Password</button>
                </a>
              <td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </body>

  </html>
<?php } else {
  header("location: Login.html");
} ?>