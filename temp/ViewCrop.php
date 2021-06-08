<?php
session_start();
if ($_SESSION["userID"]) {

    include '../model/AdminModelImpl.php';
    $obj = new AdminModelImpl();
    $data = $obj->ViewCrop();
?>
    <html>

    <head>
        <title>ViewCrop</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <!-- CSS  -->
    </head>

    <body>
        <div class="container">
            <div class="row">
                <table class="table caption-top">
                    <caption>View Crop</caption>
                    <thead>
                        <tr>
                            <th scope="col">S no</th>
                            <th scope="col">Farmer Name</th>
                            <th scope="col">Crop</th>
                            <th scope="col">Crop Type</th>
                            <th scope="col">Quantity(Kg)</th>
                            <th scope="col">Rate/kg</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        while ($row = $data->fetch_assoc()) {
                        ?>


                            <tr>

                                <td><?php echo $count; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['crop']; ?></td>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['unitPrice']; ?></td>



                            </tr>


                        <?php $count++;
                        } ?>
                    </tbody>
                </table>
                <!-- <?php echo $count; ?> -->
            </div>
        </div>
    </body>

    </html>

<?php } else {
    header("location: Login.html");
} ?>