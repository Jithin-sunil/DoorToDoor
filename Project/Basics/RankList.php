<?php
$name="";
$gender="";
$dept="";
$total="";
$pp="";
$grade="";
if(isset($_POST['btnsubmit'])!=null)
{
	$firstname=$_POST['txtfirstname'];
	$lastname=$_POST['txtlastname'];
	$gender=$_POST['gender'];
	$dept=$_POST['Department'];
	$Mark1=$_POST['txtmark1'];
	$Mark2=$_POST['txtmark2'];
	$Mark3=$_POST['txtmark3'];
	if($gender=="Male")
	{
		$name="mr.".$firstname."".$lastname;
	}
	else
	{
		$name="mrs.".$firstname."".$lastname;
	}
	$total=$Mark1+$Mark2+$Mark3;
	$pp=($total/300)*100;
	if($pp>=90)
	{
		$grade="A+";
	}
	elseif($pp>=80)
	{
		$grade="A";
	}
	 elseif($pp>=70)
	{
		$grade="B";
	}
	elseif($pp>=60)
	{
		$grade="c";
	}
	elseif($pp>=50)
	{
		$grade="D";
	}
	elseif($pp>=40)
	{
		$grade="E";
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
  <table width="289" border="1">
    <tr>
      <td width="112"><p>FirstName</p></td>
      <td width="161"><label for="txtfirstname"></label>
      <input type="text" name="txtfirstname" id="txtfirstname" /></td>
    </tr>
    <tr>
      <td>LastName</td>
      <td><label for="txtlastname"></label>
      <input type="text" name="txtlastname" id="txtlastname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td>Male
        <input type="radio" name="gender" id="Male" value="Male" />
        Female
        <label for="Male"></label>
      <input type="radio" name="gender" id="Female" value="Female" />
      <label for="Female"></label></td>
    </tr>
    <tr>
      <td>Dept</td>
      <td><label for="Department"></label>
        <select name="Department" id="Department">
     <option>--select--</option>
     <option>Computer Science</option>
     <option>Language</option>
     <option>Engineering</option>
      </select></td>
    </tr>
    <tr>
      <td>Mark1</td>
      <td><label for="txtmark1"></label>
      <input type="text" name="txtmark1" id="txtmark1" /></td>
    </tr>
    <tr>
      <td>Mark2</td>
      <td><label for="txtmark2"></label>
      <input type="text" name="txtmark2" id="txtmark2" /></td>
    </tr>
    <tr>
      <td>Mark3</td>
      <td><label for="txtmark3"></label>
      <input type="text" name="txtmark3" id="txtmark3" /></td>
    </tr>
    <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
       <input type="submit" name="btncancel" id="btncancel" value="Cancel" />
     </div></td>
      </tr>
      </table>
  <table width="355" border="1">
    <tr>
      <td width="114">Name</td>
      <td width="225"><?php echo $name ?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $gender ?></td>
    </tr>
    <tr>
      <td>Dept</td>
      <td><?php echo $dept ?></td>
    </tr>
    <tr>
      <td>Total</td>
      <td><?php echo $total ?></td>
    </tr>
    <tr>
      <td>Percentage</td>
      <td><?php echo $pp ?></td>
    </tr>
    <tr>
      <td>Grade</td>
      <td><?php echo $grade ?></td>
    </tr>
  </table>
</form>
</body>
</html>