<?php
include('../Assests/Connection/Connection.php');
include('Header.php');

if(isset($_GET['aid']))
{
	$update="update tbl_workrequest set workrequest_status='1' where workrequest_id='".$_GET['aid']."'";
	if($con->query($update))
	{
		?>
        <script>
		alert('Accepted')
		window.location="ViewUserRequest.php"
		</script>
        <?php
	}
}
if(isset($_GET['rid']))
{
	$update="update tbl_workrequest set workrequest_status='2' where workrequest_id='".$_GET['rid']."'";
	if($con->query($update))
	{
		?>
        <script>
		alert('Rejected')
		window.location="ViewUserRequest.php"
		</script>
        <?php
	}
}
if(isset($_GET['sid']))
{
	$update="update tbl_workrequest set workrequest_status='3' where workrequest_id='".$_GET['sid']."'";
	if($con->query($update))
	{
		?>
        <script>
		alert('Work Started')
		window.location="ViewUserRequest.php"
		</script>
        <?php
	}
}
if(isset($_GET['eid']))
{
	$update="update tbl_workrequest set workrequest_status='4' where workrequest_id='".$_GET['eid']."'";
	if($con->query($update))
	{
		?>
        <script>
		alert('Work Ended')
		window.location="ViewUserRequest.php"
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
  <table width="511" border="1">
    <tr>
      <td>WorkName</td>
      <td>UserName</td>
      <td>Contact</td>
      <td>Email</td>
      <td>Action</td>
    </tr>
       <?php
  				  $selqry="select * from tbl_workrequest r inner join tbl_work w on r.work_id=w.work_id inner join tbl_worker k on  w.worker_id=k.worker_id  inner join tbl_user u on r.user_id=u.user_id where k.worker_id = '".$_SESSION['wid']."'  ";
  				$req=$con->query($selqry);
  				while($data=$req->fetch_assoc())
				{
				?>
    <tr>
      <td><?php echo $data['work_name']?></td>
      <td><?php echo $data['user_name']  ?></td>
      <td><?php echo $data['user_contact']?></td>
      <td><?php echo $data['user_email']?></td>
      <td><?php
	  if($data['workrequest_status']==0)
	  {
		  ?>
          <a href="ViewUserRequest.php?aid=<?php echo $data['workrequest_id']?>">Accept</a>
          <a href="ViewUserRequest.php?rid=<?php echo $data['workrequest_id']?>">Reject</a>
          <?php
	  }
	  
	  elseif($data['workrequest_status']==1)
	  {
		  ?>
           <a href="ViewUserRequest.php?sid=<?php echo $data['workrequest_id']?>">Start Work</a>
          <?php
	  }
      elseif($data['workrequest_status']==3)
	  {
		  ?>
           <a href="ViewUserRequest.php?eid=<?php echo $data['workrequest_id']?>">End Work</a>
          <?php
	  }
	  elseif($data['workrequest_status']==4)
	  {
		  echo "Waiting for Payment";
	  }
	  elseif($data['workrequest_status']==5)
	  {
		  echo "Work Completed";
		  ?>

		  <a href="Chat.php?id=<?php echo $data['user_id']?>">Chat</a>
		  <?php
		}
	  
	  
	  else
	  {
		  echo "Rejected";
	  }
	  ?></td>
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
