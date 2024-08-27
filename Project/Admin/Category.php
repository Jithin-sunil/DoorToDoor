<?php
include('Header.php');
include('../Assests/Connection/Connection.php');
if(isset($_POST['btnsubmit']))
{
	$category=$_POST['txtcategoryname'];
	$insqry="insert into tbl_category(category_name) values('$category')";
	if($con->query($insqry))
	{
		echo "Record saved";
	}
	else
	{
		echo "Error in query";
	}
}
if(isset($_GET['delid']))
{	
	$delqry="delete from tbl_category where category_id='".$_GET['delid']."'";
	if($con->query($delqry))
	{
		echo "Record deleted";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Category Management</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    body {
        background-color: #f8f9fa;
    }
    .container {
        margin-top: 50px;
    }
    .table-container {
        max-width: 600px;
        margin: auto;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        text-align: center;
        padding: 8px;
    }
    th {
        background-color: #007bff;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .btn-custom {
        width: 100px;
        margin-top: 10px;
    }
</style>
</head>
<body>
<div class="container">
    <div class="table-container">
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txtcategoryname">Category Name</label>
                <input type="text" class="form-control" name="txtcategoryname" id="txtcategoryname" required/>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary btn-custom" name="btnsubmit" id="btnsubmit" value="Submit" />        
                <input type="reset" class="btn btn-secondary btn-custom" name="btncancel" id="btncancel" value="Cancel" />
            </div>
        </form>

        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selquery="select *from tbl_category";
                $cate=$con->query($selquery);
                $i=0;
                while($data=$cate->fetch_assoc())
                {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['category_name']; ?></td>
                    <td><a href="Category.php?delid=<?php echo $data['category_id'] ;?>" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
include('Footer.php');
?>
