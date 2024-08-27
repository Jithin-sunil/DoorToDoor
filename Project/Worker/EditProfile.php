<?php
include('../Assests/Connection/Connection.php');
include('Header.php');

if(isset($_POST['btn_submit'])) {
    $Nname = $_POST['txt_name'];
    $Nemail = $_POST['txt_email'];
    $Ncontact = $_POST['txt_contact'];
    $Naddress = $_POST['txt_address'];

    $insqry = "UPDATE tbl_worker SET worker_name='$Nname', worker_email='$Nemail', worker_contact='$Ncontact', worker_address='$Naddress' WHERE worker_id=".$_SESSION['wid'];
    if($con->query($insqry)) {
        echo "<div class='alert alert-success' role='alert'>Details changed successfully.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Details not changed. Please try again.</div>";
    }
}
?>

<div class="container mt-4">
  <h2>Edit Profile</h2>
  <form id="form1" name="form1" method="post" action="">
    <?php
    $selqry = "SELECT * FROM tbl_worker WHERE worker_id=".$_SESSION['wid'];
    $user = $con->query($selqry);
    $data = $user->fetch_assoc();
    ?>
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <label for="txt_name">Name</label>
          <input type="text" name="txt_name" class="form-control" value="<?php echo htmlspecialchars($data['worker_name']); ?>" id="txt_name" />
        </div>
        <div class="form-group">
          <label for="txt_email">Email</label>
          <input type="email" name="txt_email" class="form-control" value="<?php echo htmlspecialchars($data['worker_email']); ?>" id="txt_email" />
        </div>
        <div class="form-group">
          <label for="txt_contact">Contact</label>
          <input type="text" name="txt_contact" class="form-control" value="<?php echo htmlspecialchars($data['worker_contact']); ?>" id="txt_contact" />
        </div>
        <div class="form-group">
          <label for="txt_address">Address</label>
          <textarea name="txt_address" class="form-control" id="txt_address" rows="5"><?php echo htmlspecialchars($data['worker_address']); ?></textarea>
        </div>
        <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>

<?php
include('Footer.php');
?>
