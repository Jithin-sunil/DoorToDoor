<?php
$lresult="";
$sresult="";
if(isset($_POST['btnfind'])!=null)
{
	$number1=$_POST['txtnumber1'];
	$number2=$_POST['txtnumber2'];
	$number3=$_POST['txtnumber3'];
	if($number1>$number2)
	{
		$large=$number1;
	}
	else
	{
		$large=$number2;
	}
	if($large>$number3)
	{
		$lresult="largest".$large;
	}
	else
	{
		$lresult="largest=".$number3;
	}
	if($number1<$number2)
	{
		$small=$number1;
	}
	else
	{
		$small=$number2;
	}
	if($small<$number3)
	{
		$sresult="smallest=".$small;
	}
	else
	{
		$result="smallest=".$number3;
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
      <td width="88">Number1</td>
      <td width="96"><label for="txtnumber1"></label>
      <input type="text" name="txtnumber1" id="txtnumber1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="txtnumber2"></label>
      <input type="text" name="txtnumber2" id="txtnumber2" /></td>
    </tr>
    <tr>
      <td>Number3</td>
      <td><label for="txtnumber3"></label>
      <input type="text" name="txtnumber3" id="txtnumber3" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnfind" id="btnfind" value="Find" />
      </div></td>
    </tr>
    <tr>
      <td>Largest</td>
      <td><?php echo $lresult ?>
       </td>
    </tr>
    <tr>
      <td>Smallest</td>
      <td><?php echo $sresult ?>
       </td>
    </tr>
  </table>
</form>
</body>
</html>