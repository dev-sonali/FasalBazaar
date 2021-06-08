<?php
session_start();
if ($_SESSION["userID"]) {

  include '../model/AdminModelImpl.php';
  // $farmerId=$_GET['farmerId'];
  // $name=$_GET['name'];
  // $contact=$_GET['contact'];
  // $email=$_GET['email'];
  // $status=$_GET['status'];

  $obj = new AdminModelImpl();
  $data = $obj->ViewFarmerData();
?>
  <!DOCTYPE html>
  <html>

  <head>
    <style>
      caption {
        text-align: centre;
      }
    </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- CSS  -->
    <title>View Farmer</title>
  </head>

  <body>
    <div class="container">
      <div class="row">
        <table class="table caption-top">
          <caption>View Farmer</caption>
          <thead>
            <tr>
              <th scope="col">S no</th>
              <th scope="col">name</th>
              <th scope="col">contact</th>
              <th scope="col">emailId</th>
              <th scope="col">status</th>
            </tr>

          </thead>
          <tbody>
            <?php
            $count = 1;

            while ($row = $data->fetch_assoc()) {
              $farmerId = $row['farmerID'];
              if ($farmerId > 1) {
            ?>
                <tr>

                  <td><?php echo $count; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['contact']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['status']; ?></td>


                  <td>
                    <form action="../controller/DeleteFarmerCon.php" method="post">
                      <input type="hidden" name="Fid" value="<?php echo $row['farmerID']; ?>">
                      <input type="submit" class="btn btn-primary" value="Delete">
                    </form>
                  </td>


                </tr>

            <?php $count++;
              }
            } ?>
          </tbody>
        </table>

  </body>

  </html>

<?php } else {
  header("location: Login.html");
} ?>