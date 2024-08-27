<?php
include('../Assests/Connection/Connection.php');
if(isset($_POST['btnsubmit']))
{
	$selcategory=$_POST['seleCategory'];
	$subcategory=$_POST['txtsubcategory'];
	$insquery="insert into tbl_subcat (subcat_name,category_id) values('$subcategory','$selcategory')";
	if($con->query($insquery))
	{
		echo "insert";
	}
}
if(isset($_GET['delid']))
{
	$delquery="delete from tbl_subcat where subcat_id='".$_GET['delid']."'";
	if($con->query($delquery))
	{
		echo " delete ";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Category</td>
      <td>
      <select name="seleCategory">
          <option value=select>------select------</option>
           <?php
  				$selqry="select *from tbl_category";
  				$cate=$con->query($selqry);
  				while($data=$cate->fetch_assoc())
  				{
	  				$i++;
  			?>
            <option value="<?php echo $data['category_id']?>"><?php
			echo $data['category_name'] ?></option>
        	
        	<?php
				}
			?>
            </select>
      </td>
    </tr>
    <tr>
      <td>Subcategory</td>
      <td><label for="txtsubcategory"></label>
      <input type="text" name="txtsubcategory" id="txtsubcategory" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="200" border="1" align="center">
    <tr>
      <td>Sno</td>
      <td>Category</td>
      <td>Subcategory</td>
      <td>Action</td>
    </tr>
    <?php
	 $selqry="select * from tbl_subcat p inner join tbl_category d on p.category_id=d.category_id";
  $subcate=$con->query($selqry);
  $i=0;
  while($data=$subcate->fetch_assoc())
  {
	  $i++;
 
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['category_name'] ?></td>
      <td><?php echo $data['subcat_name'] ?></td>
      <td><a href="Subcategory.php?delid=<?php echo $data['subcat_id'];?>">Delete</a></td>
    </tr>
	<?php
  }
	?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>

