<?php
include('../Assests/Connection/Connection.php');
include('Header.php');

if (isset($_POST['btn_submit'])) {
    $Nname = $_POST['txt_name'];
    $Nemail = $_POST['txt_email'];
    $Ncontact = $_POST['txt_contact'];
    $Naddress = $_POST['txt_address'];
    
    // Sanitize input data
    $Nname = $con->real_escape_string($Nname);
    $Nemail = $con->real_escape_string($Nemail);
    $Ncontact = $con->real_escape_string($Ncontact);
    $Naddress = $con->real_escape_string($Naddress);
    
    $insqry = "UPDATE tbl_user 
               SET user_name='$Nname', user_email='$Nemail', user_contact='$Ncontact', user_address='$Naddress' 
               WHERE user_id=" . $_SESSION['uid'];
    
    if ($con->query($insqry)) {
        echo '<div class="alert alert-success" role="alert">Details changed successfully!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Details not changed: ' . $con->error . '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Edit Profile</h1>
    <form id="form1" name="form1" method="post" action="">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php
                // Fetch current user data
                $selqry = "SELECT * FROM tbl_user WHERE user_id=" . $_SESSION['uid'];
                $user = $con->query($selqry);
                $data = $user->fetch_assoc();
                ?>
                
                <div class="form-group">
                    <label for="txt_name">Name</label>
                    <input type="text" name="txt_name" class="form-control" id="txt_name" value="<?php echo htmlspecialchars($data['user_name']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="txt_email">Email</label>
                    <input type="email" name="txt_email" class="form-control" id="txt_email" value="<?php echo htmlspecialchars($data['user_email']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="txt_contact">Contact</label>
                    <input type="text" name="txt_contact" class="form-control" id="txt_contact" value="<?php echo htmlspecialchars($data['user_contact']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="txt_address">Address</label>
                    <textarea name="txt_address" class="form-control" id="txt_address" rows="5" required><?php echo htmlspecialchars($data['user_address']); ?></textarea>
                </div>
                
                <div class="form-group text-center">
                    <button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
include('Footer.php');
?>
</body>
</html>
