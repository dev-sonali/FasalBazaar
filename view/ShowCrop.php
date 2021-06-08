<?php
session_start();
if ($_SESSION["userID"]) {

    include '../model/FarmerModelImpl.php';

    $farmerID = $_SESSION["userID"];
    $sno = 1;
    $farmerObj = new FarmerModelImpl();

    $data = $farmerObj->getCropData($farmerID);

    $name = $_GET["name"];
    $contact = $_GET["contact"];
    $email = $_GET["email"];
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
                background-color: #fff;
                background-image: url("image/farmer2.webp");
                background-repeat: no-repeat;
                background-size: cover;
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

            /* main-container style */
            .main {
                display: flex;
                height: 100%;
                flex-direction: row;
                align-items: center;
            }

            .data {
                margin-top: 0px;
                text-align: center;
                display: flex;
                flex-direction: column;
                width: 100%;
            }

            .table-data {
                width: 70vw;
                margin: 50px 20px 20px 200px;
                padding: 50px;
                border-radius: 20px;
                background-color: #fff;
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
                <li class="nav-item">
                    <a class="nav-link" href="FarmerHome.php?name=<?php echo $name; ?>&contact=<?php echo $contact; ?>&email=<?php echo $email; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../controller/LogoutController.php">Logout</a>
                </li>
            </ul>
        </div>



        </div>
        <div class="data">
            <div class="table-data">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Crop ID</th>
                            <th scope="col">Crop Name</th>
                            <th scope="col">Crop Type</th>
                            <th scope="col">Quantity(kg)</th>
                            <th scope="col">Unit Price</th>
                        </tr>
                    </thead>
                    <?php while ($row = $data->fetch_assoc()) { ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $sno; ?></th>
                                <td><?php echo $row["cropID"]; ?></td>
                                <td><?php echo $row["crop"]; ?></td>
                                <td><?php echo $row["type"]; ?></td>
                                <td><?php echo $row["quantity"]; ?></td>
                                <td><?php echo $row["unitPrice"] . " Kg"; ?></td>

                                <td><a class="btn btn-primary" href="../controller/DeleteCropController.php?cropId=<?php echo $row["cropID"]; ?>&name=<?php echo $name; ?>&contact=<?php echo $contact; ?>&email=<?php echo $email; ?>" role="button">Delete</a></td>
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