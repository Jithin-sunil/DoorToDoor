<?php 
include('../Assests/Connection/Connection.php');
if(isset($_GET['aid']))
{
    $upqry="update tbl_worker set worker_status=1 where worker_id=".$_GET['aid'];
    if($con->query($upqry))
    {
        ?>
            <script>    
                alert('Worker Verified successfully');
                window.location='NewWorker.php';
            </script>
        <?php
    }
}
if(isset($_GET['rid']))
{
    $upqry="update tbl_worker set worker_status=2 where worker_id=".$_GET['rid'];
    if($con->query($upqry))
    {
        ?>
            <script>    
                alert('Worker Request Rejected');
                window.location='NewWorker.php';
            </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Worker Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        h3 {
            margin-top: 30px;
            color: #343a40;
        }
        table {
            margin-bottom: 30px;
        }
        table th, table td {
            text-align: center;
            vertical-align: middle;
        }
        .table thead th {
            background-color: #343a40;
            color: white;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-action {
            margin: 0 5px;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>New Workers</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>Proof</th>
                    <th>Date of Join</th>
                    <th>District</th>
                    <th>Place</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=0;
                $selworker=" select * from tbl_worker w inner join tbl_place p on w.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id  where worker_status = '0'";
                $resworker=$con->query($selworker);
                while ($data=$resworker->fetch_assoc()) {
                        $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['worker_name']?></td>
                    <td><?php echo $data['worker_email']?></td>
                    <td><?php echo $data['worker_contact']?></td>
                    <td><?php echo $data['worker_address']?></td>
                    <td><img src="../Assests/Files/Worker/Photo/<?php echo $data['worker_photo']?>" width="50" height="50" alt="Worker Photo"></td>
                    <td><a href="../Assests/Files/Worker/Proof/<?php echo $data['worker_proof']?>" target="_blank">View Proof</a></td>
                    <td><?php echo $data['worker_doj']?></td>
                    <td><?php echo $data['district_name']?></td>
                    <td><?php echo $data['place_name']?></td>
                    <td>
                        <a href="NewWorker.php?aid=<?php echo $data['worker_id']?>" class="btn btn-success btn-sm btn-action">Verify</a>
                        <a href="NewWorker.php?rid=<?php echo $data['worker_id']?>" class="btn btn-danger btn-sm btn-action">Reject</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <h3>Verified Workers</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>Proof</th>
                    <th>Date of Join</th>
                    <th>District</th>
                    <th>Place</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=0;
                $selworker=" select * from tbl_worker w inner join tbl_place p on w.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id  where worker_status = '1'";
                $resworker=$con->query($selworker);
                while ($data=$resworker->fetch_assoc()) {
                        $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['worker_name']?></td>
                    <td><?php echo $data['worker_email']?></td>
                    <td><?php echo $data['worker_contact']?></td>
                    <td><?php echo $data['worker_address']?></td>
                    <td><img src="../Assests/Files/Worker/Photo/<?php echo $data['worker_photo']?>" width="50" height="50" alt="Worker Photo"></td>
                    <td><a href="../Assests/Files/Worker/Proof/<?php echo $data['worker_proof']?>" target="_blank">View Proof</a></td>
                    <td><?php echo $data['worker_doj']?></td>
                    <td><?php echo $data['district_name']?></td>
                    <td><?php echo $data['place_name']?></td>
                    <td><a href="NewWorker.php?rid=<?php echo $data['worker_id']?>" class="btn btn-danger btn-sm btn-action">Reject</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <h3>Rejected Workers</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>Proof</th>
                    <th>Date of Join</th>
                    <th>District</th>
                    <th>Place</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=0;
                $selworker=" select * from tbl_worker w inner join tbl_place p on w.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id  where worker_status = '2'";
                $resworker=$con->query($selworker);
                while ($data=$resworker->fetch_assoc()) {
                        $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['worker_name']?></td>
                    <td><?php echo $data['worker_email']?></td>
                    <td><?php echo $data['worker_contact']?></td>
                    <td><?php echo $data['worker_address']?></td>
                    <td><img src="../Assests/Files/Worker/Photo/<?php echo $data['worker_photo']?>" width="50" height="50" alt="Worker Photo"></td>
                    <td><a href="../Assests/Files/Worker/Proof/<?php echo $data['worker_proof']?>" target="_blank">View Proof</a></td>
                    <td><?php echo $data['worker_doj']?></td>
                    <td><?php echo $data['district_name']?></td>
                    <td><?php echo $data['place_name']?></td>
                    <td><a href="NewWorker.php?aid=<?php echo $data['worker_id']?>" class="btn btn-success btn-sm btn-action">Verify</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
