<?php
include('../Assests/Connection/Connection.php');
include('Header.php');
?>

<form id="form1" name="form1" method="post" action="">
  <div class="container mt-4">
    <?php
    $selqry = "SELECT * FROM tbl_worker u
               INNER JOIN tbl_place p ON u.place_id = p.place_id
               INNER JOIN tbl_district d ON p.district_id = d.district_id
               WHERE u.worker_id = " . $_SESSION['wid'];
    $worker = $con->query($selqry);
    $data = $worker->fetch_assoc();
    ?>

    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <img src="../Assests/Files/Worker/Photo/<?php echo $data['worker_photo'] ?>" class="img-fluid rounded" alt="Worker Photo" />
          </div>
          <div class="col-md-6">
            <table class="table table-borderless">
              <tbody>
                <tr>
                  <th>Name</th>
                  <td><?php echo $data['worker_name'] ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?php echo $data['worker_email'] ?></td>
                </tr>
                <tr>
                  <th>Contact</th>
                  <td><?php echo $data['worker_contact'] ?></td>
                </tr>
                <tr>
                  <th>Address</th>
                  <td><?php echo $data['worker_address'] ?></td>
                </tr>
                <tr>
                  <th>District</th>
                  <td><?php echo $data['district_name'] ?></td>
                </tr>
                <tr>
                  <th>Place</th>
                  <td><?php echo $data['place_name'] ?></td>
                </tr>
                <tr>
                  <th>Date Of Joining</th>
                  <td><?php echo $data['worker_doj'] ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="text-center mt-3">
          <a href="EditProfile.php" class="btn btn-primary">Edit Profile</a>
          <a href="ChangePassword.php" class="btn btn-secondary">Change Password</a>
        </div>
      </div>
    </div>
  </div>
</form>

<?php
include('Footer.php');
?>
