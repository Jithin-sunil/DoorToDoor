<?php
include('../Assests/Connection/Connection.php');
include('Header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">User Profile</h1>
    <div class="row">
        <?php
        // Fetch user details
        $selqry = "SELECT * FROM tbl_user u 
                    INNER JOIN tbl_place p ON u.place_id = p.place_id 
                    INNER JOIN tbl_district d ON d.district_id = p.district_id 
                    WHERE u.user_id = " . $_SESSION['uid'];
        $user = $con->query($selqry);
        $data = $user->fetch_assoc();
        ?>

        <div class="col-md-4 mb-3">
            <img src="../Assests/Files/User/Photo/<?php echo htmlspecialchars($data['user_photo']); ?>" class="img-fluid" alt="User Photo">
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td><?php echo htmlspecialchars($data['user_name']); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo htmlspecialchars($data['user_email']); ?></td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td><?php echo htmlspecialchars($data['user_contact']); ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo htmlspecialchars($data['user_address']); ?></td>
                    </tr>
                    <tr>
                        <th>District</th>
                        <td><?php echo htmlspecialchars($data['district_name']); ?></td>
                    </tr>
                    <tr>
                        <th>Place</th>
                        <td><?php echo htmlspecialchars($data['place_name']); ?></td>
                    </tr>
                    <tr>
                        <th>DOB</th>
                        <td><?php echo htmlspecialchars($data['dob']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <a href="EditProfile.php" class="btn btn-primary">Edit Profile</a>
                            <a href="ChangePassword.php" class="btn btn-secondary">Change Password</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
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
