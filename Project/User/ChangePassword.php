<?php
include('../Assests/Connection/Connection.php');
include('Header.php');

if (isset($_POST["btnchangepassword"])) {
    $oldpass = $_POST["txtoldpassword"];
    $newpass = $_POST["txtnewpassword"];
    $repass = $_POST["txtretypepassword"];
    
    $selworker = "SELECT * FROM tbl_worker WHERE worker_id =" . $_SESSION['wid'];
    $worker = $con->query($selworker);
    $data = $worker->fetch_assoc();
    
    if ($data['worker_password'] == $oldpass) {
        if ($newpass == $repass) {
            $updateworker = "UPDATE tbl_worker SET worker_password='$newpass' WHERE worker_id=" . $_SESSION['wid'];
            if ($con->query($updateworker)) {
                echo "<div class='alert alert-success' role='alert'>Password Updated Successfully</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Failed to Update Password</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>New Password and Re-Type Password do not match</div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>Old Password is Incorrect</div>";
    }
}
?>

<div class="container mt-4">
  <h2>Change Password</h2>
  <form id="form1" name="form1" method="post" action="">
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <label for="txtoldpassword">Old Password</label>
          <input type="password" name="txtoldpassword" class="form-control" id="txtoldpassword" required />
        </div>
        <div class="form-group">
          <label for="txtnewpassword">New Password</label>
          <input type="password" name="txtnewpassword" class="form-control" id="txtnewpassword" required />
        </div>
        <div class="form-group">
          <label for="txtretypepassword">Re-Type Password</label>
          <input type="password" name="txtretypepassword" class="form-control" id="txtretypepassword" required />
        </div>
        <div class="text-center">
          <button type="submit" name="btnchangepassword" id="btnchangepassword" class="btn btn-primary">Change Password</button>
          <button type="reset" name="btncancel" id="btncancel" class="btn btn-secondary">Cancel</button>
        </div>
      </div>
    </div>
  </form>
</div>

<?php
include('Footer.php');
?>

