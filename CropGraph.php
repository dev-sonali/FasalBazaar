<?php
session_start();
if ($_SESSION["userID"]) {

  $name = $_GET["name"];
  $contact = $_GET["contact"];
  $email = $_GET["email"];
?>

  <html>

  <head>
    <title>Creating Dynamic Data Graph using PHP and Chart.js</title>
    <style>
      body {
        margin: 0px;
        padding: 0px;
        background-color: #f2f3f7;
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

      #main {
        width: 100%;
        height: 100%;
        margin: 0px 20px 20px 0px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        background-color: #f2f3f7;
        position: fixed;
      }

      #chart-container {
        width: 60%;
        height: auto;
        margin-top: 30px;
        padding: 30px;
        border-radius: 30px;
        background-color: #f2f3f7;
        box-shadow: 6px 6px 6px #8e8e8e, -6px -6px 6px #fff;
      }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.0/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  </head>

  <body>
    <!--navBar-->

    <div id="navigation-bar">
      <div class="nav-item" id="nav-fasalbazaar">
        <h2 class="nav-text" id="fasal">fasal</h2>
        <h2 class="nav-text">Bazaar</h2>
        <img src="view/image/logo.png" width="35" height="35">
      </div>

      <ul class="nav justify-content-end" style="margin-right: 10px;">

        <li class="nav-item">
          <a class="nav-link" href="view/FarmerHome.php?name=<?php echo $name; ?>&contact=<?php echo $contact; ?>&email=<?php echo $email; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./controller/LogoutController.php">Logout</a>
        </li>

      </ul>
    </div>

    <div id="main">
      <!-- Graph -->
      <div id="chart-container">
        <canvas id="cropdataGraph" style="width:100%; max-width: 700px;"></canvas>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        showGraph();
      });


      function showGraph() {
        $.post("GraphModelImpl.php", function(data) {
          console.log();
          var c_crop = [];
          var c_quantity = [];

          for (var i in data) {
            c_crop.push(data[i].crop);
            c_quantity.push(data[i].quantity);
          }

          var chartdata = {
            labels: c_crop,
            datasets: [{
              label: 'Quantity (in kg)',
              backgroundColor: '#49e2ff',
              borderColor: '#46d5f1',
              hoverBackgroundColor: '#CCCCCC',
              hoverBorderColor: '#666666',
              data: c_quantity
            }]
          };

          var graphTarget = $("#cropdataGraph");

          var barGraph = new Chart(graphTarget, {
            type: 'bar',
            data: chartdata
          });
        })
      }
    </script>

  </body>

  </html>

<?php } else {
  header("location: ./view/Login.html");
} ?>