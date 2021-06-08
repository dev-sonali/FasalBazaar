<?php
session_start();
if ($_SESSION["userID"]) {

  $name = $_GET["name"];
  $contact = $_GET["contact"];
  $email = $_GET["email"];
?>

  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <style>
      /* *{
        border:1px solid red;
      } */
      body {
        margin: 0px;
        padding: 0px;
        background-image: url("image/farmer1.webp");
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
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

      .card {
        margin-top: 30px;
        margin-left: 0px;
      }

      .card {
        width: 130px;
        text-align: center;

        padding: 10px 10px 20px 10px;
        border-radius: 0px;
        border: 1px solid #556b2f;
        background-color: #adff2f;
        box-shadow: 10px 10px 5px #006400;
        box-shadow: 10px -10px -5px #f8f8ff;
        box-shadow: -10px -10px -5px #a5b13f;
      }

      .link {
        text-decoration: none;
        color: black;
      }

      table td {
        padding: 5px;
        margin: 5px;
        width: 70%;
        border-radius: 5px;
      }

      a:hover {
        background-color: #f7f7f7;
        text-shadow: 5px 5px 10px cyan;
      }

      .dropdown {
        left: 100px;
      }

      #main {

        margin: 0px 20px 20px 20px;
        display: flex;
        flex-direction: row;
        padding: 20px;
      }

      #profile-data {
        margin-top: 0vh;
        margin-left: 30vw;
        margin-right: 0vh;
        width: 70vw;
        height: 60vh;
        display: flex;
        flex-direction: row;
        padding: 20px;

      }

      #data {
        flex: 1.5;
        margin-left: 20px;
        text-align: center;
      }

      table {
        margin: 40px 20px 15px 15px;
      }

      table h2 {
        text-align: left;
      }

      .button {
        margin-bottom: 20px;
      }

      h1 {
        margin-top: 10px;
      }
    </style>
    <title>Farmer Home</title>
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
          <!-- <a class="nav-link" href="#">Home</a> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../controller/LogoutController.php">Logout</a>
        </li>

      </ul>
    </div>

    <div class=" card" style="width: 18rem; position:fixed; margin: top 50px;">
      <div class="mt-5 card-header shadow p-3 mb-5 bg-body rounded">
        <ul class="list-group list-group-flush">

          <li class="list-group-item"><a class="link" href="AddCrop.php">Add Crop</a></li>
          <li class="list-group-item"><a class="link" href="ShowCrop.php">Show Crop</a></li>
          <li class="list-group-item"><a class="link" href="../CropGraph.php">Crop status</a></li>
          <li class="list-group-item"><a class="link" href="UpdateFarmerProfile.php?name=<?php echo $name; ?>&contact=<?php echo $contact; ?>&email=<?php echo $email; ?>">Update Profile</a></li>

        </ul>
      </div>
    </div>
    <div id="main">
      <div class="card1" id="profile-data">

        <div class="card" id="data">
          <h1> Profile </h1>
          <table align="center" width=100%>
            <tr>
              <td>
                <h2>Name</h2>
              <td>
              <td>
                <h2><?php echo $name; ?></h2>
              <td>
            </tr>
            <tr>
              <td>
                <h2>Contact</h2>
              <td>
              <td>
                <h2><?php echo $contact; ?></h2>
              <td>
            </tr>
            <tr>
              <td>
                <h2>Email</h2>
              <td>
              <td>
                <h2><?php echo $email; ?></h2>
              <td>
            </tr>

          </table>
        </div>
      </div>
    </div>
    </div>
  </body>

  </html>

<?php } else {
  header("location: Login.html");
} ?>