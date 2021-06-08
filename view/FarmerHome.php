<?php
session_start();
if ($_SESSION["userID"]) {
    include '../model/FarmerModelImpl.php';
    $farmerID = $_SESSION["userID"];

    $farmerObj = new FarmerModelImpl();
    $data = $farmerObj->getRecentCrop($farmerID);
    $recentCrop = array();
    while ($row = $data->fetch_assoc()) {
        $recentCrop[] = $row["crop"];
    }
    $recentCrop = array_unique($recentCrop);

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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <title>Farmer Home</title>
        <style>
            /* * {
                border: 1px solid red;
            } */

            /*body style*/
            body {
                margin: 0px;
                width: 100%;
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
                flex: 1.5;
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
                margin-top: 10px;
            }

            .data-card {
                background-color: #fff;
                border-radius: 20px;
                padding: 20px;
            }

            .add-crop {
                flex: 3;
                margin: 0px 40px 0px 40px;
                padding: 40px;
            }

            .recent {
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .recent div {
                height: 50vh;
            }

            form {
                text-align: center;
            }

            table {
                padding-right: 20px;
                width: 100%;
            }

            table h4 {
                margin-left: 20px;
                text-align: left;
            }

            table input,
            select {
                margin-right: 20px;
            }

            .table-input {
                text-align: right;
            }

            button {
                margin-top: 80px;
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
                    <a class="nav-link active" aria-current="page" href="../CropGraph.php?name=<?php echo $name; ?>&contact=<?php echo $contact; ?>&email=<?php echo $email; ?>">Crop Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="UpdateFarmerProfile.php?name=<?php echo $name; ?>&contact=<?php echo $contact; ?>&email=<?php echo $email; ?>">Update Profile</a>
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
                        <h4>Name</h4>
                        <h5><?php echo $name; ?></h5>
                        <h4 class="text">Contact</h4>
                        <h5><?php echo $contact; ?></h5>
                        <h4 class="text">Email</h4>
                        <h5><?php echo $email; ?></h5>
                    </div>
                </div>
                <div class="add-crop data-card">
                    <h2 style="text-align:center; margin-bottom:40px;font-weight:bold">Add Crop to your stock</h2>

                    <form action="../controller/AddcropController.php" method="POST">
                        <table>
                            <tr>
                                <td>
                                    <h4>Crop</h4>
                                </td>
                                <td class="table-input"><input type="text" name="crop" required></td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Category</h4>
                                </td>
                                <td class="table-input"><select name="type" id="type">
                                        <option value="grain"> Grain </option>
                                        <option value="vegetable"> Vegetable </option>
                                        <option value="fruits"> Fruits </option>
                                        <option value="nuts"> Nuts </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Quantity</h4>
                                </td>
                                <td class="table-input"><input type="number" name="quantity" min=1 required></td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Rate/Kg</h4>
                                </td>
                                <td class="table-input"><input type="number" name="rate" min=1 required></td>
                            </tr>
                        </table>
                        <input type="hidden" name="farmerID" value=<?php echo $farmerID; ?>>
                        <input type="hidden" name="name" value=<?php echo $name; ?>>
                        <input type="hidden" name="contact" value=<?php echo $contact; ?>>
                        <input type="hidden" name="email" value=<?php echo $email; ?>>
                        <button class="btn btn-success">Submit</button>
                    </form>
                </div>
                <div class="recent data-card">
                    <h4 style="font-weight:bold; text-align:center; margin-bottom:15px;">Recently added crop</h4>
                    <div style="overflow:hidden;overflow-y:scroll; margin-bottom: 15px;">
                        <ol>
                            <?php foreach ($recentCrop as $crop) {
                                echo "<li><h5>$crop</h5></li>";
                            } ?>
                        </ol>
                    </div>
                    <a href="ShowCrop.php?name=<?php echo $name; ?>&contact=<?php echo $contact; ?>&email=<?php echo $email; ?>" class="btn btn-success">Crop Details</a>
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