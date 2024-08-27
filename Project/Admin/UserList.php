<?php
include('../Assests/Connection/Connection.php');
if(isset($_GET["delid"])!=null)
{
	$district_id=$_GET["delid"];
	$delqry="delete from tbl_user where user_id='$district_id'";
	if($con->query($delqry))
	{
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
  <table width="417" border="1">
    <tr>
      <td>SerialNo</td>
      <td>Name</td>
      <td>Email</td>
      <td>District</td>
      <td>Place</td>
      <td>Address</td>
      <td>Photo</td>
      <td>Proof</td>
      <td>Password</td>
      <td>Action</td>
    </tr>
    <?php
	$selqry="select *from tbl_user";
	$user=$con->query($selqry);
	$i=0;
	while($data=$user->fetch_assoc())
	{
		$i++;
	}
		?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>