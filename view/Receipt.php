<?php
session_start();
if ($_SESSION["userID"]) {

    $retailerID = $_SESSION["userID"];

    $farmerName = $_GET["farmerName"];
    $farmerContact = $_GET["farmerContact"];
    $farmerEmail = $_GET["farmerEmail"];
    $crop = $_GET["crop"];
    $quantity = $_GET["quantity"];
    $rate = $_GET["rate"];
    $type = $_GET["type"];
    $total = $_GET["total"];
    $flag = $_GET["flag"];

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Receipt</title>
        <style>
            /* * {
            border: 1px solid red;
        } */

            /*body style*/
            body {
                margin: 0px;
                height: 100%;
                width: 100%;
                background-color: #f2f3f7;
                /* position: fixed; */
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

            /* main style */
            .main {
                display: flex;
                flex-direction: column;
                width: 100%;
            }

            .container {
                margin-top: 80px;
            }

            .receipt {

                margin: 30px 20vw 30px 20vw;
                padding: 20px 50px 40px 50px;
                display: flex;
                flex-direction: column;
                border-radius: 20px;
                box-shadow: 6px 6px 6px #8e8e8e, -6px -6px 6px #fff;
            }

            .receipt-section {
                margin-bottom: 20px;
            }

            .order-msg {
                display: flex;
                flex-direction: column;
                text-align: center;
            }

            h1 {
                font-size: 50px;
            }

            h4 {
                font-weight: lighter;
            }

            table {
                width: 100%;
            }

            .left-data {
                font-size: 20px;
                font-weight: bold;
            }

            .right-data {
                text-align: right;
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
                <li class=" nav-item">
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

        <!-- main container -->
        <div class="main">
            <div class="container">
                <?php if ($flag == 1) { ?>
                    <div class="order-msg">
                        <h5 style="font-size:30px;">- Order Placed -</h5>
                        <h6 style="font-weight:lighter; font-size:20px">Thank you for supporting our platform.</h6>
                    </div>
                <?php } else { ?>
                    <div class="order-msg">
                        <h5 style="font-size:30px;">Receipt [ID - <?php echo $_GET["historyID"]; ?>]</h5>
                    </div>
                <?php } ?>

                <div class="receipt">
                    <div style="display:flex; justify-content:center;">
                        <div class="nav-item" id="nav-fasalbazaar">
                            <img src="image/logo-rev.png" width="35" height="35">
                            <h2 class="nav-text" id="fasal" style="color:black;font-size:35px;">fasal</h2>
                            <h2 class="nav-text" style="color:black;font-size:35px;">Bazaar</h2>
                            <img src="image/logo.png" width="35" height="35">
                        </div>
                    </div>

                    <div class="receipt-section">
                        <h4>Total Price</h4>
                        <div style="display:flex;flex-direction:row;">
                            <h1 style="font-weight:15; margin-right:10px;">Rs.</h1>
                            <h1><?php echo $total; ?>/-</h1>
                        </div>
                    </div>

                    <div class="receipt-section">
                        <div style="text-align:center;">
                            <h4>Order Detail</h4>
                        </div>
                        <table>
                            <tr>
                                <td class="left-data">Crop</td>
                                <td class="right-data"><?php echo $crop; ?></td>
                            </tr>
                            <tr>
                                <td class="left-data">Category</td>
                                <td class="right-data"><?php echo $type; ?></td>
                            </tr>
                            <tr>
                                <td class="left-data">Quantity</td>
                                <td class="right-data"><?php echo $quantity; ?> Kg</td>
                            </tr>
                            <tr>
                                <td class="left-data">Rate/Kg</td>
                                <td class="right-data">Rs. <?php echo $rate; ?></td>
                            </tr>
                            <tr style="background-color:#e0e1e4">
                                <td class="left-data">Total</td>
                                <td class="right-data">Rs. <?php echo $total; ?></td>
                            </tr>
                        </table>
                    </div>

                    <div class="receipt-section">
                        <div style="text-align:center;">
                            <h4>Seller Detail</h4>
                        </div>
                        <table>
                            <tr>
                                <td class="left-data">Name</td>
                                <td class="right-data"><?php echo $farmerName; ?></td>
                            </tr>
                            <tr>
                                <td class="left-data">Contact</td>
                                <td class="right-data"><?php echo $farmerContact; ?></td>
                            </tr>
                            <tr>
                                <td class="left-data">Email</td>
                                <td class="right-data"><?php echo $farmerEmail; ?></td>
                            </tr>
                        </table>
                    </div>

                    <div class="receipt-section" style="text-align:center;">
                        <a class="btn btn-success" href="RetailerHome.php">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php } else {
    header("location: Login.html");
} ?>