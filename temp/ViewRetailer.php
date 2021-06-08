<?php
session_start();
if ($_SESSION["userID"]) {

  include '../model/AdminModelImpl.php';
  //call object of Admin class
  $obj = new AdminModelImpl();
  $data = $obj->ViewRetailerData();

  // $retailerId=$_GET['retailerID'];
  // $name=$_GET['name'];
  // $contact=$_GET['contact'];
  // $email=$_GET['email'];
  // $status=$_GET['status'];
  // echo $retailerId;
?>
  <html>

  <head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- CSS  -->
    <title>View Retailer</title>
  </head>

  <body>
    <div class="container">
      <div class="row">
        <table class="table caption-top">
          <caption>View Retailer</caption>
          <thead>
            <tr>
              <th scope="col">name</th>
              <th scope="col">contact</th>
              <th scope="col">emailId</th>
              <th scope="col">status</th>

            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = $data->fetch_assoc()) {
              $retailerId = $row['retailerID'];
              if ($retailerId > 1) {
            ?>
                <tr>

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
            <?php }
            } ?>
          </tbody>
        </table>
  </body>

  </html>

<?php } else {
  header("location: Login.html");
} ?>