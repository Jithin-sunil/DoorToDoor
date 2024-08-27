<?php
include('../Assests/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnadd"]))
{
	$Qual=$_POST['txtqual'];
	$Exp=$_POST['txtexp'];
	$Certificate=$_FILES['file_certificate']['name'];
	$temp=$_FILES['file_certificate']['tmp_name'];
	move_uploaded_file($temp,'../Assests/Files/Worker/Certificate/'.$Certificate);
 	$insqry="insert into tbl_achivement (qualification,experience,certificate,worker_id)values('".$Qual."','".$Exp."','".$Certificate."','".$_SESSION['wid']."')";
	if($con->query($insqry))
	{
		?>
        <script>
		alert('Inserted')
		window.location="Achievments.php"
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="537" height="247" border="1">
    <tr>
      <td width="302"><div align="center">Qualification</div></td>
      <td width="160"><label for="txtqual"></label>
      <input type="text" name="txtqual" id="txtqual" /></td>
    </tr>
    <tr>
      <td><div align="center">Experience</div></td>
      <td><label for="txtexp">
        <input type="text" name="txtexp" id="txtexp" />
      </label></td>
    </tr>
    <tr>
      <td><div align="center">Certificate</div></td>
      <td><label for="txtdetails"></label>
        <label for="file_certificate"></label>
      <input type="file" name="file_certificate" id="file_certificate" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnadd" id="btnadd" value="Upload" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="598" height="102" border="1">
    <tr>
      <td width="97"><div align="center">SINO</div></td>
      <td width="110"><div align="center">Qualification</div></td>
      <td width="91"><div align="center">Experience</div></td>
      <td width="102"><div align="center">Certificate</div></td>
      <td width="164"><div align="center">Action</div></td>
    </tr>
    <?php
    $i=0;
    $selqry="Select * from tbl_achivement where worker_id=".$_SESSION['wid'];
    $res=$con->query($selqry);
    while($data=$res->fetch_assoc())
    {
      $i++;
    
    ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['qualification'] ?></td>
      <td><?php echo $data['experience'] ?></td>
      <td><?php echo $data['certificate'] ?></td>
      <td><a href="">Delete</a></td>
      
    </tr>
    <?php
    }
    ?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php
include('Footer.php');
?>
