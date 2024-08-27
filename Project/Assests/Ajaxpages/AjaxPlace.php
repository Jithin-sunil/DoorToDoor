<option value="">select place </option>
<?php
include("../Connection/Connection.php");
$selqry="select * from tbl_place where district_id=".$_GET['did'];
$result=$con->query($selqry);
while($data=$result->fetch_assoc())
{
	?>
<option value="<?php echo $data['place_id']	?>"><?php echo $data['place_name']?></option>
<?php
}
?>