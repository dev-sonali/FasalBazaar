<?php
session_start();
if ($_SESSION["userID"]) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Retailer Home</title>
    <style>
      /* *{
            border: 1px solid red;
        } */

      /*body style*/
      body {
        margin: 0px;
        height: 100vh;
        width: 100vw;
        background-image: url(image/green-1117267_1920.jpg);
        z-index: -1;
        position: fixed;
      }

      /*link style*/
      a {
        text-decoration: none;
      }

      /*navbar style*/
      #navigation-bar {
        width: 100vw;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        background-color: #2c2f33;
        position: fixed;
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

      /*main container style*/
      #main-container {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
      }

      /*text animation*/
      #text {
        flex: 2;
        height: 100vh;
        /*This part is important for centering*/
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }

      .typing-demo {
        width: 23ch;
        color: #fff;
        animation: typing 3s steps(23), .7s step-end infinite alternate;
        /* animation-iteration-count:infinite; */
        white-space: nowrap;
        overflow: hidden;
        /* border-right: 3px solid; */
        font-size: 2.2em;
      }

      @keyframes typing {
        from {
          width: 0
        }
      }

      @keyframes blink {
        70% {
          border-color: transparent
        }
      }

      .text-animation-container {
        /* background-color: #fff; */
        margin-top: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 110px;
        overflow: hidden;
      }

      .text-animation {
        display: flex;
        flex-direction: column;
        align-items: space-around;
        text-align: center;
        width: 70%;
        animation: rise 25s, infinite alternate;
        animation-iteration-count: infinite;
        animation-delay: 3s;
      }

      .text-animation h1,
      h2 {
        margin-bottom: 10px;
        font-family: Helvetica, sans-serif;
        font-weight: bolder;
      }

      .text-animation-data {
        margin: 30px 0px 30px 0px;
      }

      @keyframes rise {
        0% {
          margin-top: 0px;
        }

        12.5% {
          margin-top: -110px;
        }

        25% {
          margin-top: -220px;
        }

        37.5% {
          margin-top: -323px;
        }

        50% {
          margin-top: -423px;
        }

        62.5% {
          margin-top: -530px;
        }

        75% {
          margin-top: -670px;
        }

        87.5% {
          margin-top: -790px;
        }

        100% {
          margin-top: -880px;
        }
      }

      /*marketplace card style*/
      #market {
        flex: 1;
        margin: 45px 40px 0px 50px;
        width: 35vw;
        text-align: center;
      }

      /*card style*/
      .card {
        background-color: #ececee;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 6px 6px 6px #32891f, -6px -6px 6px #adcfa5;
      }

      /*category style*/
      .category {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        text-align: center;
        margin-top: 15px;
      }

      /*category icon image style*/
      .card img {
        padding: 15px;
        border-radius: 100px;
        margin-bottom: 10px;
        margin-top: 10px;
        box-shadow: 4px 4px 4px #8e8e8e, -4px -4px 4px #fff;
      }

      .card img:hover {
        box-shadow: 7px 7px 7px #8e8e8e, -7px -7px 7px #fff;
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

      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="BuyHistory.php">History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../controller/ShowRetailerProfile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../controller/LogoutController.php">Logout</a>
        </li>
      </ul>
    </div>

    <!--main container-->
    <div id="main-container">
      <div id="text">
        <div class="typing-demo">
          <h1>Welcome to fasalBazaar </h1>
        </div>
        <div class="text-animation-container">
          <div class="text-animation">
            <h2 class="text-animation-data">Thank You For Choosing Us</h2>
            <h1>Buy Local & Directly From The Farmer</h1>
            <h1 class="text-animation-data">In Just 5 Easy Steps - </h1>
            <h1 style="margin-top:40px;">1. Choose Category</h1>
            <h1 style="margin-top:40px;">2. Select Crop</h1>
            <h1 class="text-animation-data">3. Compare The Price And Select</h1>
            <h1 class="text-animation-data">4. Enter The Quantity You Want</h1>
            <h1 class="text-animation-data">5. Click On Buy</h1>
          </div>
        </div>
      </div>

      <!--marketpalce card-->
      <div class="card" id="market">
        <h3>Select A Category To Buy</h3>

        <!--category row 1-->
        <div class="category">
          <div>
            <a href="RetailerGrainMarket.php?type=grain&crop=Wheat">
              <img src="image/grain.png" width="120" height="120">
              <h4>Grains</h4>
            </a>
          </div>

          <div>
            <a href="RetailerVegetableMarket.php?type=vegetable&crop=Potato">
              <img src="image/vegetables.png" width="120" height="120">
              <h4>Vegetables</h4>
            </a>
          </div>
        </div>

        <!--category row 2-->
        <div class="category">
          <div>
            <a href="RetailerFruitMarket.php?type=fruit&crop=Apple">
              <img src="image/fruits.png" width="120" height="120">
              <h4>Fruits</h4>
            </a>
          </div>

          <div>
            <a href="RetailerNutMarket.php?type=nuts&crop=Almond">
              <img src="image/nuts.png" width="120" height="120">
              <h4>Nuts</h4>
            </a>
          </div>
        </div>
      </div>
    </div>
  </body>

  </html>
<?php } else {
  header("location: Login.html");
} ?>