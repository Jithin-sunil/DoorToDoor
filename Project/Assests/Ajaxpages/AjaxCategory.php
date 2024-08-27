<option value="">Select Subcategory</option>
<?php
include("../Connection/Connection.php");

$selqry="select * from tbl_subcat where category_id=".$_GET['catId'];
$result=$con->query($selqry);
while($data=$result->fetch_assoc())
{
	?>
<option value="<?php echo $data['subcat_id']?>"><?php echo $data['subcat_name']?></option>
<?php
}
?>