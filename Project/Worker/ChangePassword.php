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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  

<div class="container mt-5">
  <h2 class="text-center">Change Password</h2>
  <form id="form1" name="form1" method="post" action="">
    <div class="card" style="max-width: 500px; margin: 0 auto;">
      <div class="card-body" >
        <table class="table table-bordered table-sm" style="max-width: 500px; margin: 0 auto;">
          <tbody>
            <tr>
              <td>Old Password</td>
              <td><input type="password" name="txtoldpassword" class="form-control" id="txtoldpassword" required /></td>
            </tr>
            <tr>
              <td>New Password</td>
              <td><input type="password" name="txtnewpassword" class="form-control" id="txtnewpassword" required /></td>
            </tr>
            <tr>
              <td>Re-Type Password</td>
              <td><input type="password" name="txtretypepassword" class="form-control" id="txtretypepassword" required /></td>
            </tr>
            <tr>
              <td colspan="2" class="text-center">
                <button type="submit" name="btnchangepassword" id="btnchangepassword" class="btn btn-primary">Change Password</button>
                <button type="reset" name="btncancel" id="btncancel" class="btn btn-secondary">Cancel</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </form>
</div>
</body>
</html>
<?php
include('Footer.php');
?>
