<?php
include('../Assests/Connection/Connection.php');
session_start();
if(isset($_POST["btnsubmit"]))
{
	$email=$_POST['txtemail'];
	$password=$_POST['password'];
	$selAdmin="select * from tbl_admin where admin_email = '".$email."' and admin_password = '".$password."'";
	$resultAdmin=$con -> query($selAdmin);
	
	$selUser="select * from tbl_user where user_email = '".$email."' and user_password = '".$password."'";
	$resultUser=$con -> query($selUser);
	
	$selWorker="select * from tbl_worker where worker_email = '".$email."' and worker_password = '".$password."'";
	$resultWorker=$con -> query($selWorker);
	
	if($data = $resultAdmin->fetch_assoc())
	{
		$_SESSION['aid']=$data['admin_id'];
		$_SESSION['aName']=$data ['admin_name'];
		header('location:../Admin/HomePage.php');
	}
	else if($data =$resultUser->fetch_assoc())
	{
		$_SESSION['uid'] = $data['user_id'];
		$_SESSION['uName'] = $data['user_name'];
		header('location:../User/HomePage.php');
	}
	else if($data=$resultWorker->fetch_assoc())
	{
		$_SESSION['wid']=$data['worker_id'];
		$_SESSION['wName']=$data ['woker_name'];
		header('location:../Worker/HomePage.php');
	}

else
	{
		?>
		
		<script>
				alert("Invalid Credentials...");
		</script>
		<?php
	}





}







?>












<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <!-- <table width="200" border="1">
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="password"></label>
      <input type="password" name="password" id="password" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      </div></td>
    </tr>
  </table> -->
  <link rel="stylesheet" href="../Assests/Templates/Main/css/css.css">
  <br>
  <br>
<div class="login-wrap">
	<div class="login-html">
		<br>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<br>
					<label for="user" class="label">Email</label>
					<input id="user" type="text" name="txtemail" class="input">
				</div>
				<div class="group">
					<br>
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" name="password" class="input" data-type="password">
				</div>
				<!-- <div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div> -->
				<div class="group">
					<br>
					<input type="submit" name="btnsubmit" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
				<!-- <div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div> -->
			</div>
			<!-- <div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" class="input">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
		</div> -->
	</div>
</div>
</form>
</body>
</html>