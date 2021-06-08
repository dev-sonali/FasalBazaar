<?php
session_start();
if ($_SESSION["userID"]) {

  include '../model/FarmerModelImpl.php';
  $farmerID = $_SESSION["userID"];
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
      body {
        margin: 0px;
        padding: 0px;
        background-image: url("image/farmer.webp");
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
      }

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

      .container {
        max-width: 80%;
        padding: 34px;
        margin: auto;
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

      input,
      textarea {

        border: 2px solid rgb(20, 2, 2);
        border-radius: 6px;
        outline: none;
        font-size: 16px;
        width: 40%;
        margin: 11px 0px;
        padding: 7px;
      }

      form {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }

      .btn {
        color: white;
        background: rgb(117, 5, 5);
        padding: 8px 12px;
        font-size: 20px;
        border: 2px solid white;
        border-radius: 14px;
        cursor: pointer;
      }

      .bg {
        width: 100%;
        position: absolute;
        z-index: -1;
        opacity: 0.6;
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
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../controller/LogoutController.php">Logout</a>
        </li>

      </ul>
    </div>
    <!-- Input fields to take the input -->
    <div class="container">
      <h1>Add Crop to your stock</h3>
        <p>Enter details </p>

        <form action="../controller/AddcropController.php" method="POST">
          <input type="text" name="crop" placeholder="Crop">
          <input type="text" name="type" placeholder="Type">
          <input type="number" name="quantity" placeholder="Quantity">
          <input type="number" name="rate" placeholder="Rate/kg">
          <input type="hidden" name="farmerID" value=<?php echo $farmerID; ?>>
          <button class="btn">Submit</button>
        </form>
    </div>

  </body>

  </html>
<?php } else {
  header("location: Login.html");
} ?>