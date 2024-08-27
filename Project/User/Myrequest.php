<?php
include('../Assests/Connection/Connection.php');
include('Header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Requests</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Work Requests</h1>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Work Name</th>
                <th>Worker Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selqry = "SELECT * FROM tbl_workrequest r 
                        INNER JOIN tbl_work w ON r.work_id=w.work_id 
                        INNER JOIN tbl_worker k ON w.worker_id=k.worker_id  
                        INNER JOIN tbl_user u ON r.user_id=u.user_id 
                        WHERE u.user_id = '" . $_SESSION['uid'] . "'";
            $req = $con->query($selqry);
            while ($data = $req->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($data['work_name']); ?></td>
                <td><?php echo htmlspecialchars($data['worker_name']); ?></td>
                <td><?php echo htmlspecialchars($data['worker_contact']); ?></td>
                <td><?php echo htmlspecialchars($data['worker_email']); ?></td>
                <td><?php echo htmlspecialchars($data['price']); ?></td>
                <td>
                    <?php
                    if ($data['workrequest_status'] == 0) {
                        echo "Pending";
                    } elseif ($data['workrequest_status'] == 1) {
                        echo "Accepted";
                        ?>
                         <a href="Chat.php?id=<?php echo $data['worker_id']; ?>" class="btn btn-success btn-sm">Chat</a>
                        <?php
                    } elseif ($data['workrequest_status'] == 3) {
                        echo "Work Started";
                        ?>
                        <a href="Chat.php?id=<?php echo $data['worker_id']; ?>" class="btn btn-success btn-sm">Chat</a>
                       <?php
                    } elseif ($data['workrequest_status'] == 4) {
                        echo "Work Ended";
                        ?>
                        <a href="Payment.php?pid=<?php echo $data['workrequest_id']; ?>" class="btn btn-primary btn-sm">Payment</a>
                        <a href="Chat.php?id=<?php echo $data['worker_id']; ?>" class="btn btn-success btn-sm">Chat</a>

                        <?php
                    } elseif ($data['workrequest_status'] == 5) {
                        echo "Work Completed";
                        ?>
                        <a href="Rating.php?pid=<?php echo $data['worker_id']; ?>" class="btn btn-warning btn-sm">Rating</a>
                        <a href="Bill.php?id=<?php echo $data['workrequest_id']; ?>" class="btn btn-info btn-sm">Bill</a>
                        <a href="Complaint.php?wid=<?php echo $data['worker_id']; ?>" class="btn btn-success btn-sm">Complaint</a>

                        <?php
                    } else {
                        echo "Rejected";
                    }
                    ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
include('Footer.php');
?>
</body>
</html>
