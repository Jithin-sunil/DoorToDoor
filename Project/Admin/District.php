<?php
include('Header.php');
include('../Assests/Connection/Connection.php');

if(isset($_POST["btnsubmit"])!=null)
{
    $districtname=$_POST['txtdistrict'];
    $insqry="insert into tbl_district(district_name)values('$districtname')";
    if($con->query($insqry))
    {
        echo "Record saved";
    }
    else
    {
        echo "Error in query";
    }
}

if(isset($_GET["delID"])!=null)
{
    $district_id=$_GET["delID"];
    $delqry="delete from tbl_district where district_id='$district_id'";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>District Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                <label for="txtdistrict">District Name</label>
                <input type="text" name="txtdistrict" id="txtdistrict" class="form-control" required/>
            </div>
            <div class="text-center">
                <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" class="btn btn-primary btn-custom" />
            </div>
        </form>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>District Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selqry="select * from tbl_district";
                $result=$con->query($selqry);
                $i=0;
                while($data=$result->fetch_assoc())
                {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $data["district_name"]?></td>
                    <td>
                        <a href="District.php?delID=<?php echo $data["district_id"]?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php
                }?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
include('Footer.php');
?>
