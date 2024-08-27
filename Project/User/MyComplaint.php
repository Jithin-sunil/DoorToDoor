<?php
session_start();
include('../Assests/Connection/Connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>#</td>
                <td>Worker</td>
                <td>Work</td>
                <td>Date</td>
                <td>Reply</td>
                <td>Action</td>
            </tr>
            <?php
            $i=0; 
            $sel="select * from tbl_complaint c inner join tbl_work w on c.work_id=w.work_id inner join tbl_worker r on w.worker_id=r.worker_id  where c.user_id=".$_SESSION['uid'];
            $res=$con->query($sel);
            while($data=$res->fetch_assoc())
            {

            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data['worker_name']?></td>
                <td><?php echo $data['work_name']?></td>
                <td><?php echo $data['complaint_date']?></td>
                <td><?php
                    if($data['complaint_status']==1)
                    {
                        echo $data['complaint_reply']
                    }
                    else
                    {
                        echo "Not Replyed";
                    }
                ?></td>
                <td><a href="">Delete</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </form>
</body>
</html>