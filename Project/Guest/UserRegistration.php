<?php
include('Header.php');
include('../Assests/Connection/Connection.php');

if (isset($_POST["btnsubmit"])) {
    $name = $_POST['txtname'];
    $email = $_POST['txtemail'];
    $place = $_POST['selplace'];
    $password = $_POST['txtpassword'];
    $confirmpassword = $_POST['txtconfirmpassword'];
    $date = $_POST['date'];
    $contact = $_POST['txtcontact'];
    $address = $_POST['txtaddress'];
    
    $photo = $_FILES['filephoto']['name'];
    $tempphoto = $_FILES['filephoto']['tmp_name'];
    move_uploaded_file($tempphoto, '../Assests/Files/User/Photo/' . $photo);
    
    $proof = $_FILES['fileproof']['name'];
    $tempproof = $_FILES['fileproof']['tmp_name'];
    move_uploaded_file($tempproof, '../Assests/Files/User/Proof/' . $proof);

    $selu="select * from tbl_user where user_email='".$email."' ";
    $u=$con->query($selu);

    $sela="Select * from tbl_admin where admin_email='".$email."' ";
    $a=$con->query($sela);

    $selw="Select * from tbl_worker where worker_email='".$email."' ";
    $w=$con->query($selw);

    if ($u->num_rows > 0 || $a->num_rows > 0 || $w->num_rows > 0) {
        echo '<div class="alert alert-danger" role="alert">Email already exists!</div>';
        exit();
    }

    else
    {
        if ($confirmpassword == $password) {
            $insqry = "INSERT INTO tbl_user(user_name, user_email, place_id, user_address, user_photo, user_proof, user_password, dob, user_contact)
                       VALUES ('$name', '$email', '$place', '$address', '$photo', '$proof', '$password', '$date', '$contact')";
            if ($con->query($insqry)) {
                echo '<div class="alert alert-success" role="alert">User Registration Successful!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">User Registration Failed: ' . $con->error . '</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Passwords do not match!</div>';
        }
    }

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">User Registration</h1>
    <form action="" method="post" enctype="multipart/form-data" id="form1">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="form-group">
                    <label for="txtname">Name</label>
                    <input type="text" name="txtname" class="form-control" id="txtname" required oninput="validateName()">
                    <span id="nameError" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="txtemail">Email</label>
                    <input type="email" name="txtemail" class="form-control" id="txtemail" required oninput="validateEmail()">
                    <span id="emailError" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="seldistrict">District</label>
                    <select name="seldistrict" id="seldistrict" class="form-control" onchange="getPlace(this.value); validateDistrict()" required>
                        <option value="">----- Select -----</option>
                        <?php
                        $selqry = "SELECT * FROM tbl_district";
                        $district = $con->query($selqry);
                        while ($data = $district->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $data['district_id'] ?>"><?php echo $data['district_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <span id="districtError" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="sel_place">Place</label>
                    <select name="selplace" id="sel_place" class="form-control" required onchange="validatePlace()">
                        <option value="">----- Select -----</option>
                    </select>
                    <span id="placeError" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="txtaddress">Address</label>
                    <textarea name="txtaddress" id="txtaddress" class="form-control" rows="5" required oninput="validateAddress()"></textarea>
                    <span id="addressError" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="date">Date of Birth</label>
                    <input type="date" name="date" class="form-control" id="date" max="<?php echo date('Y-m-d')?>" required>
                </div>

                <div class="form-group">
                    <label for="txtcontact">Contact No</label>
                    <input type="text" name="txtcontact" class="form-control" id="txtcontact" required oninput="validateContact()">
                    <span id="contactError" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="filephoto">Photo</label>
                    <input type="file" name="filephoto" class="form-control-file" id="filephoto" required onchange="validatePhoto()">
                    <span id="photoError" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="fileproof">Proof</label>
                    <input type="file" name="fileproof" class="form-control-file" id="fileproof" required onchange="validateProof()">
                    <span id="proofError" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="txtpassword">Password</label>
                    <input type="password" name="txtpassword" class="form-control" id="txtpassword" required oninput="validatePassword()">
                    <span id="passwordError" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="txtconfirmpassword">Confirm Password</label>
                    <input type="password" name="txtconfirmpassword" class="form-control" id="txtconfirmpassword" required oninput="validateConfirmPassword()">
                    <span id="confirmPasswordError" class="text-danger"></span>
                </div>

                <div class="form-group text-center">
                    <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../Assests/JQ/JQuery.js"></script>
<script>
    function getPlace(did) {
        $.ajax({
            url: "../Assests/AjaxPages/AjaxPlace.php?did=" + did,
            success: function (result) {
                $("#sel_place").html(result);
            }
        });
    }

    function validateName() {
        var name = document.getElementById('txtname').value;
        var namePattern = /^[a-zA-Z\s]+$/;
        if (!namePattern.test(name)) {
            document.getElementById('nameError').innerText = 'Invalid name (only letters and spaces are allowed).';
        } else {
            document.getElementById('nameError').innerText = '';
        }
    }

    function validateContact() {
        var contact = document.getElementById('txtcontact').value;
        var contactPattern = /^[0-9]{10}$/;
        if (!contactPattern.test(contact)) {
            document.getElementById('contactError').innerText = 'Invalid contact (must be a 10-digit number).';
        } else {
            document.getElementById('contactError').innerText = '';
        }
    }

    function validateEmail() {
        var email = document.getElementById('txtemail').value;
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email)) {
            document.getElementById('emailError').innerText = 'Invalid email format.';
        } else {
            document.getElementById('emailError').innerText = '';
        }
    }

    function validateAddress() {
        var address = document.getElementById('txtaddress').value;
        if (address === '') {
            document.getElementById('addressError').innerText = 'Please enter your address.';
        } else {
            document.getElementById('addressError').innerText = '';
        }
    }

    function validatePassword() {
        var password = document.getElementById('txtpassword').value;
        var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
        if (!passwordPattern.test(password)) {
            document.getElementById('passwordError').innerText = 'Password must be at least 6 characters long and include at least one uppercase letter, one lowercase letter, and one digit.';
        } else {
            document.getElementById('passwordError').innerText = '';
        }
    }

    function validateConfirmPassword() {
        var password = document.getElementById('txtpassword').value;
        var confirmPassword = document.getElementById('txtconfirmpassword').value;
        if (confirmPassword !== password) {
            document.getElementById('confirmPasswordError').innerText = 'Passwords do not match.';
        } else {
            document.getElementById('confirmPasswordError').innerText = '';
        }
    }

    function validateDistrict() {
        var district = document.getElementById('seldistrict').value;
        if (district === '') {
            document.getElementById('districtError').innerText = 'Please select a district.';
        } else {
            document.getElementById('districtError').innerText = '';
        }
    }

    function validatePlace() {
        var place = document.getElementById('sel_place').value;
        if (place === '') {
            document.getElementById('placeError').innerText = 'Please select a place.';
        } else {
            document.getElementById('placeError').innerText = '';
        }
    }

    function validatePhoto() {
        var photo = document.getElementById('filephoto').value;
        if (photo === '') {
            document.getElementById('photoError').innerText = 'Please upload your photo.';
        } else {
            document.getElementById('photoError').innerText = '';
        }
    }

    function validateProof() {
        var proof = document.getElementById('fileproof').value;
        if (proof === '') {
            document.getElementById('proofError').innerText = 'Please upload a proof document.';
        } else {
            document.getElementById('proofError').innerText = '';
        }
    }
</script>
</body>
</html>
<?php 
include('Footer.php');
?>