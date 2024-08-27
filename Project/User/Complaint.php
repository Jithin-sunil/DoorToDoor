<?php
session_start();
include('../Assests/Connection/Connection.php');
if(isset($_POST['btnsubmit']))
{
  $ins="insert into tbl_complaint (complaint_content,complaint_date,work_id,user_id)values('".$_POST['txtcomplaint']."',curdate(),'".$_GET['wid']."','".$_SESSION['uid']."')";
  if($con->query($ins))
  {
    ?>
    <script>
      alert('Complaint Registred')
      window.location="Complaint.php";
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
  <table width="385" border="1">
    <tr>
      <td>Content</td>
      <td><label for="txtcomplaint"></label>
      <textarea name="txtcomplaint" id="txtcomplaint" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include('Footer.php');
?>
