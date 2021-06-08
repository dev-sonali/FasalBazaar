<?php
session_start();
if ($_SESSION["userID"]) {

    include '../model/AdminModelImpl.php';

    $obj = new AdminModelImpl();
    $data = $obj->ViewRetailerData();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Admin</title>
        <style>
            /* * {
            border: 1px solid red;
        } */

            body {
                margin: 0px;
                padding: 0px;
                background-color: #c5c9cb;
            }

            /*navbar style*/
            #navigation-bar {
                width: 100vw;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                background-color: #2c2f33;
                /* position: fixed; */
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

            }

            .navigation-panal {
                /* flex: 1; */
                width: 20vw;
                height: 100%;
                position: fixed;
                left: 0px;
                display: flex;
                flex-direction: column;
                padding: 25px;
                align-items: center;
            }

            /* .data {
                flex: 5
            } */

            .card {
                width: 220px;
                padding: 10px;
                border-radius: 20px;
                /* box-shadow: 4px 4px 4px #8e8e8e, -4px -4px 4px #fff; */
                background-color: #fff;
            }

            .navigation-link {
                display: flex;
                flex-direction: column;
                margin-top: 20px;
                padding: 20px;
                height: 60vh;
                background-color: #2a302f;
            }

            .navigation-link a {
                margin-bottom: 20px;
                text-decoration: none;
                color: #fff;
            }

            .navigation-link a:hover {
                color: #2fff00;
            }

            .caption {
                position: fixed;
                top: 20px;
                width: 100%;
                margin-top: 30px;
                text-align: center;
                padding-top: 10px;
                padding-bottom: 10px;
                z-index: -1;
            }

            .table-data {
                background-color: #fff;
                width: 75vw;
                margin: 60px 20px 20px 200px;
                padding: 50px;
                border-radius: 30px;
                /* box-shadow: inset 4px 4px 4px #8e8e8e, inset -4px -4px 4px #fff; */
                position: fixed;
                overflow: hidden;
                overflow-y: scroll;
                height: 75vh;
            }
        </style>
    </head>

    <body>
        <!--navBar-->
        <div id="navigation-bar">
            <div class="nav-item" id="nav-fasalbazaar">
                <h2 class="nav-text" id="fasal">fasal</h2>
                <h2 class="nav-text">Bazaar</h2>

            </div>
            <ul class="nav justify-content-end">

                <li class="nav-item">
                    <a class="nav-link" href="../controller/LogoutController.php">Logout</a>
                </li>
            </ul>
        </div>

        <!-- main container -->
        <div class="main">
            <div class="container">
                <div class="navigation-panal">
                    <div class="user-count card">
                        <table>
                            <tr>
                                <td>
                                    <h4>Total User</h4>
                                </td>
                                <td>
                                    <h2>30</h2>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Active User</h4>
                                </td>
                                <td>
                                    <h2>27</h2>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="navigation-link card">
                        <a href="AdminFarmer.php">
                            <h4>Farmer Data</h4>
                        </a>
                        <a href="#">
                            <h4 style="color:#2fff00;">Retailer Data</h4>
                        </a>
                        <a href="AdminCrop.php">
                            <h4>Crop Data</h4>
                        </a>
                        <a href="AdminHistory.php">
                            <h4>History</h4>
                        </a>
                    </div>
                </div>

                <div class="data">
                    <div class="caption">
                        <h3>Retailer Data</h3>
                    </div>
                    <div class="table-data">
                        <table class="table caption-top">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Email ID</th>
                                    <th scope="col">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;

                                while ($row = $data->fetch_assoc()) {
                                    $retailerId = $row['retailerID'];
                                    if ($retailerId > 1) {
                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['contact']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['status']; ?></td>

                                            <td>
                                                <form action="../controller/DeleteRetailerCon.php" method="post">
                                                    <input type="hidden" name="Rid" value="<?php echo $row['retailerID']; ?>">
                                                    <input type="submit" class="btn btn-primary" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                <?php $count++;
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

<?php
} else {
    header("location: Login.html");
}
?>