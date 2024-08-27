<?php
include('../Assests/Connection/Connection.php');
if(isset($_POST["btnregister"]))
{
    $name=$_POST["txtname"];
	$email=$_POST["txtemail"];
	$password=$_POST["txtpassword"];
	$insqry="insert into tbl_admin(admin_name,admin_email,admin_password)values('$name','$email','$password')";
	if($con->query($insqry))
	{
		echo"record saved";
	}
	else
	{
		echo"error in query";
	}
}

if(isset($_GET["delID"]))
{
	$admin_ID=$_GET["delID"];
	$delQry="delete from tbl_admin where admin_id=$admin_ID";
	if($con->query($delQry))
	{

		?>
		<script>
			alert("Record Deleted...");
			window.location="AdminRegistration.php";
			</script>
			<?php
	}
	else
	{
		?>
		<script>
		alert("error");
		window.location="AdminRegistration.php";
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
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnregister" id="btnregister" value="Register" />
      </div></td>
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td>Email</td>
      <td>Action</td>
      <
    </tr>
    <?php
	   $selQry="select * from tbl_admin";
	   $result=$con->query($selQry);
	   $i=0;
	   while($data=$result->fetch_assoc())
	   {
	   $i++;
	   	
	   
	
	?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $data["admin_name"]?></td>
      <td><?php echo $data["admin_email"]?></td>
      <td><?php echo $data["admin_password"]?></td>
      <td><a href="AdminRegistration.php?delID=<?php echo $data["admin_id"]?>">Delete</a></td>    
    </tr>
    <?php
	}
	?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>