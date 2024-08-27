<?php
include('../Assests/Connection/Connection.php');

include('Header.php');

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Viewcomplaints</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<form action="" method="post" name="frm_complaints">
  <h3>User Complaint</h3>
<table width="943" height="142" border="1" align="center">
    <tr>
      <td width="103" height="55">Sl No</td>
      <td>User Name</td>
      <td>Work name</td>
      <td>worker name</td>
      <td width="198">Complaint</td>
      <td width="100">Date</td>
      <td width="120">Action</td>
    </tr>
    
    <?php 
			$selqry="select * from tbl_complaint c inner join tbl_work w on c.work_id=w.work_id inner join tbl_worker r on w.worker_id=r.worker_id inner join tbl_user u on c.user_id=u.user_id where complaint_status='0' "; 
			$complaint=$con->query($selqry);
    		$i=0;
  				while($data=$complaint->fetch_assoc())
  					{
	  				$i++;
					
		?>

    
    
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['user_name'] ?></td>
      <td><?php echo $data['work_name'] ?></td>
      <td><?php echo $data['worker_name'] ?></td>
      <td><?php echo $data['complaint_content'] ?></td>
      <td><?php echo $data['complaint_date'] ?></td>
      <td><a href="Reply.php?rep=<?php echo $data['complaint_id']?>">Reply</a></td>
    </tr>
    
    <?php
					}
	
	?>
    
  </table>
  <h3>Worker Complaint</h3>
<table width="943" height="142" border="1" align="center">
    <tr>
      <td width="103" height="55">Sl No</td>
      <td>worker name</td>
      <td width="198">Complaint</td>
      <td width="100">Date</td>
      <td width="120">Action</td>
    </tr>
    
    <?php 
			$selqry="select * from tbl_complaint c inner join tbl_worker w on c.worker_id=w.worker_id where complaint_status='0' "; 
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
      <td><a href="Reply.php?rep=<?php echo $data['complaint_id']?>">Reply</a></td>
    </tr>
    
    <?php
					}
	
	?>
    
  </table>
  </form>
</body>
</html>
<?php
include('Footer.php');
?>
