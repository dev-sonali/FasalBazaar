<?php
session_start();
if ($_SESSION["userID"]) {
?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <style>
            /* * {
                border: 1px solid red;
            } */

            body {
                margin: 0px;
                padding: 0px;
                background-image: url("https://wallpapercave.com/wp/wp1886339.jpg");
                background-size: cover;
            }


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

            /* .rounded{
            background-color: #949499;
            
            height: 70vh;
            width: 40vh;
        }*/
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

            h3 {
                text-align: center;
                font-size: 30px;

                color: #fff;
            }

            .sps {

                background-color: #949499;
                /* margin-top: 10px; */
                display: flex;
                flex-direction: column;
                justify-content: top;
                height: 90vh;
                width: 40vh;


            }

            .text {
                font-size: 50px;
                color: #fff;

            }

            .card {

                margin: 5px 5px;
                width: 190px;
                border-radius: 10px;
                box-shadow: 6px 6px 5px rgb(133, 128, 128);
            }

            .link {
                margin-top: 5px;
                padding: 5px;
                font-size: xx-large;
                text-decoration: none;
                list-style-type: square;
                color: white;
            }

            td {

                width: 200px;
            }

            .container {
                display: flex;
                flex-direction: row;
                margin-left: -5px;
            }
        </style>
        <title></title>
    </head>

    <body>

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
        <h3>Admin Dashboard</h3>
        <div class="container">
            <div class="sps">

                <div class="card">
                    <ul>
                        <table>
                            <tr>
                                <td>Total User</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Active User</td>
                                <td></td>
                            </tr>
                        </table>
                </div>


                <li><a class="link " href="../view/ViewFarmer.php">Farmer Data</a></li>
                <li><a class="link " href="../view/ViewRetailer.php">Retailer Data</a></li>
                <li><a class="link " href="../view/ViewCrop.php">Crop </a></li>
                <li><a class="link " href="../view/ViewHistory.php">History</a></li>
                </ul>
            </div>
            <div style="display: flex;justify-content:center;align-items: center;top: 100px; margin-left: 130px; margin-top: 90px;">
                <img src="image/Admin2.jpg" height="450" width="500" class="rounded">
            </div>

            <!-- Option 2: Separate Popper and Bootstrap JS -->

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        </div>
    </body>

    </html>

<?php } else {
    header("location: Login.html");
} ?>