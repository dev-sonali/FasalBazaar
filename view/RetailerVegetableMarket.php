<?php
session_start();
if ($_SESSION["userID"]) {

    include '../model/RetailerModelImpl.php';

    $type = $_GET["type"];
    $crop = $_GET["crop"];
    $sno = 1;
    $retailerObj = new RetailerModelImpl();

    $data = $retailerObj->getCrop($type, $crop);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Market</title>
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
                z-index: 2;
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

            .main {
                display: flex;
                height: 100%;
                flex-direction: row;
                /* align-items: center; */
            }

            .img-btn {
                /* margin-left: 20px;
            margin-top: 20vh; */
                display: flex;
                flex-direction: column;
                /* position: fixed; */
                margin: 120px 0px 40px 20px;
                z-index: 1;
            }

            .img-btn img {
                padding: 15px;
                border-radius: 100px;
                margin-bottom: 10px;
                margin-top: 10px;
                box-shadow: 4px 4px 4px #8e8e8e, -4px -4px 4px #fff;
            }

            .img-btn img:hover {
                box-shadow: 7px 7px 7px #8e8e8e, -7px -7px 7px #fff;
            }

            #link {
                width: 70;
                height: 70;
                position: relative;
                display: inline-block;
            }

            #link .grain {
                display: none;
                position: absolute;
                z-index: 99;
            }

            #link:hover .grain {
                display: inline;
            }

            .data {
                margin-top: 50px;
                margin-left: -60px;
                text-align: center;
                width: 100%;
            }

            .table-data {
                width: 70vw;
                margin: 60px 20px 20px 200px;
                padding: 50px;
                border-radius: 30px;
                box-shadow: inset 4px 4px 4px #8e8e8e, inset -4px -4px 4px #fff;
                position: fixed;
                overflow: hidden;
                overflow-y: scroll;
                height: 75vh;
            }

            .caption {
                position: fixed;
                top: 10px;
                width: 100%;
                margin-top: 30px;
                text-align: center;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: #f2f3f7;
            }

            h4 {
                margin-top: 30px;
                margin-left: 15px;
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

        <!--main-->
        <div class="main">
            <div class="img-btn">
                <div>
                    <?php if ($crop == "Potato") { ?>
                        <div id="link">
                            <img src="image/vegetables/potato.png" width="70" height="70">
                        </div>
                    <?php } else { ?>
                        <a href="RetailerVegetableMarket.php?type=vegetable&crop=Potato" id="link">
                            <img src="image/vegetables/potato-blk.png" width="70" height="70">
                            <h4 class="grain">Potato</h4>
                        </a>
                    <?php } ?>
                </div>
                <div>
                    <?php if ($crop == "Tomato") { ?>
                        <div id="link">
                            <img src="image/vegetables/tomato.png" width="70" height="70">
                        </div>
                    <?php } else { ?>
                        <a href="RetailerVegetableMarket.php?type=vegetable&crop=Tomato" id="link">
                            <img src="image/vegetables/tomato-blk.png" width="70" height="70">
                            <h4 class="grain">Tomato</h4>
                        </a>
                    <?php } ?>
                </div>
                <div>
                    <?php if ($crop == "Onion") { ?>
                        <div id="link">
                            <img src="image/vegetables/onion.png" width="70" height="70">
                        </div>
                    <?php } else { ?>
                        <a href="RetailerVegetableMarket.php?type=vegetable&crop=Onion" id="link">
                            <img src="image/vegetables/onion-blk.png" width="70" height="70">
                            <h4 class="grain">Onion</h4>
                        </a>
                    <?php } ?>
                </div>
                <div>
                    <?php if ($crop == "Cabbage") { ?>
                        <div id="link">
                            <img src="image/vegetables/cabbage.png" width="70" height="70">
                        </div>
                    <?php } else { ?>
                        <a href="RetailerVegetableMarket.php?type=vegetable&crop=Cabbage" id="link">
                            <img src="image/vegetables/cabbage-blk.png" width="70" height="70">
                            <h4 class="grain">Cabbage</h4>
                        </a>
                    <?php } ?>
                </div>

                <div>
                    <?php if ($crop == "Pumpkin") { ?>
                        <div id="link">
                            <img src="image/vegetables/pumpkin.png" width="70" height="70">
                        </div>
                    <?php } else { ?>
                        <a href="RetailerVegetableMarket.php?type=vegetable&crop=Pumpkin" id="link">
                            <img src="image/vegetables/pumpkin-blk.png" width="70" height="70">
                            <h4 class="grain">Pumpkin</h4>
                        </a>
                    <?php } ?>
                </div>

                <div>
                    <?php if ($crop == "Mushroom") { ?>
                        <div id="link">
                            <img src="image/vegetables/mushroom.png" width="70" height="70">
                        </div>
                    <?php } else { ?>
                        <a href="RetailerVegetableMarket.php?type=vegetable&crop=Mushroom" id="link">
                            <img src="image/vegetables/mushroom-blk.png" width="70" height="70">
                            <h4 class="grain">Mushroom</h4>
                        </a>
                    <?php } ?>
                </div>

                <div>
                    <?php if ($crop == "Cauliflower") { ?>
                        <div id="link">
                            <img src="image/vegetables/cauliflower.png" width="70" height="70">
                        </div>
                    <?php } else { ?>
                        <a href="RetailerVegetableMarket.php?type=vegetable&crop=Cauliflower" id="link">
                            <img src="image/vegetables/cauliflower-blk.png" width="70" height="70">
                            <h4 class="grain">Cauliflower</h4>
                        </a>
                    <?php } ?>
                </div>

                <div>
                    <?php if ($crop == "Peas") { ?>
                        <div id="link">
                            <img src="image/vegetables/peas.png" width="70" height="70">
                        </div>
                    <?php } else { ?>
                        <a href="RetailerVegetableMarket.php?type=vegetable&crop=Peas" id="link">
                            <img src="image/vegetables/peas-blk.png" width="70" height="70">
                            <h4 class="grain">Peas</h4>
                        </a>
                    <?php } ?>
                </div>

                <div>
                    <?php if ($crop == "Carrot") { ?>
                        <div id="link">
                            <img src="image/vegetables/carrot.png" width="70" height="70">
                        </div>
                    <?php } else { ?>
                        <a href="RetailerVegetableMarket.php?type=vegetable&crop=Carrot" id="link">
                            <img src="image/vegetables/carrot-blk.png" width="70" height="70">
                            <h4 class="grain">Carrot</h4>
                        </a>
                    <?php } ?>
                </div>

                <div>
                    <?php if ($crop == "Broccoli") { ?>
                        <div id="link">
                            <img src="image/vegetables/broccoli.png" width="70" height="70">
                        </div>
                    <?php } else { ?>
                        <a href="RetailerVegetableMarket.php?type=vegetable&crop=Broccoli" id="link">
                            <img src="image/vegetables/broccoli-blk.png" width="70" height="70">
                            <h4 class="grain">Broccoli</h4>
                        </a>
                    <?php } ?>
                </div>

                <div>
                    <?php if ($crop == "Beet") { ?>
                        <div id="link">
                            <img src="image/vegetables/beet.png" width="70" height="70">
                        </div>
                    <?php } else { ?>
                        <a href="RetailerVegetableMarket.php?type=vegetable&crop=Beet" id="link">
                            <img src="image/vegetables/beet-blk.png" width="70" height="70">
                            <h4 class="grain">Beet Root</h4>
                        </a>
                    <?php } ?>
                </div>

                <div>
                    <?php if ($crop == "Eggplant") { ?>
                        <div id="link">
                            <img src="image/vegetables/eggplant.png" width="70" height="70">
                        </div>
                    <?php } else { ?>
                        <a href="RetailerVegetableMarket.php?type=vegetable&crop=Eggplant" id="link">
                            <img src="image/vegetables/eggplant-blk.png" width="70" height="70">
                            <h4 class="grain">Eggplant</h4>
                        </a>
                    <?php } ?>
                </div>

                <div>
                    <?php if ($crop == "Spinach") { ?>
                        <div id="link">
                            <img src="image/vegetables/spinach.png" width="70" height="70">
                        </div>
                    <?php } else { ?>
                        <a href="RetailerVegetableMarket.php?type=vegetable&crop=Spinach" id="link">
                            <img src="image/vegetables/spinach-blk.png" width="70" height="70">
                            <h4 class="grain">Spinach</h4>
                        </a>
                    <?php } ?>
                </div>

            </div>
            <div class="data">
                <div class="caption">
                    <h2>Crop: <?php echo $crop; ?></h2>
                </div>
                <div class="table-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Email</th>
                                <th scope="col">Crop</th>
                                <th scope="col">Quantity(Kg)</th>
                                <th scope="col">Rate/Kg</th>
                            </tr>
                        </thead>
                        <?php while ($row = $data->fetch_assoc()) { ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $sno; ?></th>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["contact"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["crop"]; ?></td>
                                    <td><?php echo $row["quantity"] . " Kg"; ?></td>
                                    <td>Rs. <?php echo $row["unitPrice"]; ?></td>
                                    <td><a class="btn btn-primary" href="./Market.php?name=<?php echo $row["name"]; ?>&contact=<?php echo $row["contact"]; ?>&email=<?php echo $row["email"]; ?>&type=Vegetable&crop=<?php echo $row["crop"]; ?>&quantity=<?php echo $row["quantity"]; ?>&unitPrice=<?php echo $row["unitPrice"]; ?>&farmerID=<?php echo $row["farmerID"]; ?>&cropID=<?php echo $row["cropID"]; ?>" role="button">Buy</a></td>
                                </tr>
                            </tbody>
                        <?php
                            $sno++;
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php } else {
    header("location: Login.html");
} ?>