<?php
session_start();
if ($_SESSION["userID"]) {

    include '../model/RetailerModelImpl.php';

    $retailerID = $_SESSION["userID"];
    $sno = 1;
    $retailerObj = new RetailerModelImpl();

    $data = $retailerObj->purchaseHistory($retailerID);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>History</title>
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

            .main {
                display: flex;
                height: 100%;
                justify-content: center;
            }

            .data {
                margin-top: 110px;
                text-align: center;
                width: 70%;
            }

            .caption {
                position: fixed;
                top: 10px;
                width: 70%;
                margin-top: 30px;
                text-align: center;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: #f2f3f7;
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
                    <a class="nav-link active" aria-current="page" href="RetailerHome.php">Home</a>
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
            <div class="data">
                <div class="caption">
                    <h2>History</h2>
                </div>
                <div class="table-data">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Crop</th>
                                <th scope="col">Category</th>
                                <th scope="col">Quantity(Kg)</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <?php while ($row = $data->fetch_assoc()) { ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $sno; ?></th>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["contact"]; ?></td>
                                    <td><?php echo $row["crop"]; ?></td>
                                    <td><?php echo $row["type"]; ?></td>
                                    <td><?php echo $row["quantity"] . " Kg"; ?></td>
                                    <td>Rs. <?php echo $row["totalPrice"]; ?></td>
                                    <td><a class="btn btn-primary" href="./Receipt.php?farmerName=<?php echo $row["name"]; ?>&farmerContact=<?php echo $row["contact"]; ?>&farmerEmail=<?php echo $row["email"]; ?>&type=<?php echo $row["type"]; ?>&crop=<?php echo $row["crop"]; ?>&quantity=<?php echo $row["quantity"]; ?>&rate=<?php echo $row["unitPrice"]; ?>&total=<?php echo $row["totalPrice"]; ?>&historyID=<?php echo $row["historyID"]; ?>&flag=0" role="button">View Receipt</a></td>
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