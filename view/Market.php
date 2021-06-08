<?php
session_start();
if ($_SESSION["userID"]) {

    $farmerID = $_GET["farmerID"];
    $farmerName = $_GET["name"];
    $farmerContact = $_GET["contact"];
    $farmerEmail = $_GET["email"];
    $cropID = $_GET["cropID"];
    $crop = $_GET["crop"];
    $quantity = $_GET["quantity"];
    $unitPrice = $_GET["unitPrice"];
    $type = $_GET["type"];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <title>Buy</title>
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
                display: flex;
                flex-direction: row;
                margin-top: 80px;
            }

            .farmer-profile {
                flex: 1;
                display: flex;
                flex-direction: column;
                border-radius: 20px;
                padding: 15px;
                background-color: #fff;
            }

            .profile-image {
                flex: 1;
            }

            .profile-data {
                flex: 1.3;
                text-align: center;
            }

            .profile-data h4 {
                font-weight: bold;
            }

            .purchase-area {
                flex: 3;
                height: 80vh;
                width: 100%;
                margin-left: 20px;
                padding: 20px;
                border-radius: 20px;
                box-shadow: 6px 6px 6px #8e8e8e, -6px -6px 6px #fff;
            }

            .p-area-top {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }

            .total-price {
                width: 250px;
                height: 150px;
                padding: 20px;
                border-radius: 20px;
                box-shadow: inset 4px 4px 4px #8e8e8e, inset -4px -4px 4px #fff;
            }

            #price {
                width: 140px;
                background-color: #f2f3f7;
                border: none;
                font-weight: bolder;
            }

            .text {
                padding-top: 14px;
            }

            form {
                text-align: center;
                margin-top: 10vh;
            }

            form button {
                margin-top: 10vh;
                width: 100px;
                ;
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

        <div class="main">
            <div class="container">
                <div class="farmer-profile">
                    <div class="profile-image">
                        <img src="profileImage/profile.png" width="255" height="180">
                    </div>
                    <div class="profile-data">
                        <h4>Farmer Name</h4>
                        <h5><?php echo $farmerName; ?></h5>
                        <h4 class="text">Contact</h4>
                        <h5><?php echo $farmerContact; ?></h5>
                        <h4 class="text">Email</h4>
                        <h5><?php echo $farmerEmail; ?></h5>
                    </div>
                </div>
                <div class="purchase-area">
                    <div class="p-area-top">
                        <table width="400">
                            <tr>
                                <td>
                                    <h3>Category</h3>
                                </td>
                                <td>
                                    <h4><?php echo $type; ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3>Crop</h3>
                                </td>
                                <td>
                                    <h4><?php echo $crop; ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3>Available Qunatity</h3>
                                </td>
                                <td>
                                    <h4><?php echo $quantity; ?> Kg</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3>Rate/Kg</h3>
                                </td>
                                <td>
                                    <h4>Rs. <?php echo $unitPrice; ?>/-</h4>
                                </td>
                            </tr>
                        </table>
                        <div class="total-price">
                            <h2>Total Price:</h2><br>
                            <h3>Rs. <input type="number" name="totalPrice" id="price" value=0>/-</h3>
                        </div>
                    </div>
                    <div>
                        <form action="../controller/MarketController.php" method="post">

                            <h3>Quantity : <input type="number" name="quantity" min=1 max=<?php echo $quantity; ?> value=0 id="quantity" class="input"></h3>
                            <input type="hidden" name="rate" value=<?php echo $unitPrice; ?>>
                            <input type="hidden" name="farmerID" value=<?php echo $farmerID; ?>>
                            <input type="hidden" name="cropID" value=<?php echo $cropID; ?>>
                            <input type="hidden" name="farmerName" value=<?php echo $farmerName; ?>>
                            <input type="hidden" name="farmerContact" value=<?php echo $farmerContact; ?>>
                            <input type="hidden" name="farmerEmail" value=<?php echo $farmerEmail; ?>>
                            <input type="hidden" name="crop" value=<?php echo $crop; ?>>
                            <input type="hidden" name="type" value=<?php echo $type; ?>>
                            <br>
                            <!-- Button trigger modal -->
                            <button type="submit" class="btn btn-success">
                                Buy
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(e) {
            $(".input").on('input', function() {
                var x = document.getElementById('quantity').value;
                x = parseFloat(x);

                var y = parseFloat(<?php echo $unitPrice; ?>);

                document.getElementById('price').value = x * y;
            });

        });
    </script>

    </html>

<?php } else {
    header("location: Login.html");
} ?>