<?php
$result=" ";
if(isset($_POST['btnplus'])!=null)
{
	$number1=$_POST['txtno1'];
	$number2=$_POST['txtno2'];
	$sum=$number1 + $number2;
	$result="sum=".$sum;
}
if(isset($_POST['btnminus'])!=null)
{
	$number1=$_POST['txtno1'];
	$number2=$_POST['txtno2'];
	$sum=$number1 - $number2;
	$result="difference=".$difference;
}
if(isset($_POST['btnmultiply'])!=null)
{
	$number1=$_POST['txtno1'];
	$number2=$_POST['txtno2'];
	$sum=$number1 * $number2;
	$result="multiply=".$multiply;
}
if(isset($_POST['btndivision'])!=null)
{
	$number1=$_POST['txtno1'];
	$number2=$_POST['txtno2'];
	$sum=$number1 / $number2;
	$result="division=".$division;
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
  <table width="262" border="1">
    <tr>
      <td width="92">Number1</td>
      <td width="154"><label for="txtno1"></label>
      <input type="text" name="txtno1" id="txtno1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="txtno2"></label>
      <input type="text" name="txtno2" id="txtno2" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnplus" id="btnplus" value="+" />
        <input type="submit" name="btnminus" id="btnminus" value="-" />
        <input type="submit" name="btnmultiply" id="btnmultiply" value="*" />
        <input type="submit" name="btndivision" id="btndivision" value="/" />
      </div></td>
    </tr>
    <tr>
      <td>Result</td>
      <td><?php echo $result ?>
      </td>
      </tr>
  </table>
</form>
</body>
</html>
