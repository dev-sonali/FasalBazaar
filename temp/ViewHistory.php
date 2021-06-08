<?php
session_start();
if ($_SESSION["userID"]) {

    include '../model/AdminModelImpl.php';
    $obj = new AdminModelImpl();
    $result = $obj->ViewHistory();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <!-- CSS  -->
        <style>
            .card {
                margin: 5px 5px;
                border-radius: 20px;
                box-shadow: 5px 10px #cbbeb5, -6px 5px -10px #d1e3d1;
            }
        </style>
        <title>ViewHistory</title>
    </head>

    <body>
        <div class="card">
            <div class="container">
                <div class="row">
                    <caption>View History</caption>
                    <table class="table">
                        <thead>
                            <thead>
                                <tr>
                                    <th scope="col">S no</th>
                                    <th scope="col">Farmer name</th>
                                    <th scope="col">Retailer name</th>
                                    <th scope="col">Crop</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">TotalPrice</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['crop']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['totalPrice']; ?></td>
                                </tr>
                            <?php $count++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

    </html>

<?php } else {
    header("location: Login.html");
} ?>