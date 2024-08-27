<?php
session_start();
include('../Assests/Connection/Connection.php');
if(isset($_POST['btnsubmit']))
{
  $ins="insert into tbl_complaint (complaint_content,complaint_date,worker_id)values('".$_POST['txtcomplaint']."',curdate(),'".$_SESSION['wid']."')";
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
<table width="943" height="142" border="1" align="center">
    <tr>
      <td width="103" height="55">Sl No</td>
      <td>worker name</td>
      <td width="198">Complaint</td>
      <td width="100">Date</td>
      <td width="120">Action</td>
    </tr>
    
    <?php 
			$selqry="select * from tbl_complaint c inner join tbl_worker w on c.worker_id=w.worker_id where w.worker_id=".$_SESSION['wid']; 
			$complaint=$con->query($selqry);
    		$i=0;
  				while($data=$complaint->fetch_assoc())
  					{
	  				$i++;
					
		?>

    
    
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['worker_name'] ?></td>
      <td><?php echo $data['complaint_content'] ?></td>
      <td><?php echo $data['complaint_date'] ?></td>
      <td><?php
                    if($data['complaint_status']==1)
                    {
                        echo $data['complaint_reply']
                    }
                    else
                    {
                        echo "Not Replyed";
                    }
                ?></td>
                <td><a href="">Delete</a></td>
    </tr>
    
    <?php
					}
	
	?>
    
  </table>
</body>
</html>
<?php
include('Footer.php');
?>
