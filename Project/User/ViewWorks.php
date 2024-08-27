<?php
include('../Assests/Connection/Connection.php');
include('Header.php');

if (isset($_GET['reqid'])) {
    $insqry = "INSERT INTO tbl_workrequest (workrequest_date, work_id, user_id) VALUES (CURDATE(), '" . $_GET['reqid'] . "', '" . $_SESSION['uid'] . "')";
    if ($con->query($insqry)) {
        echo '<div class="alert alert-success" role="alert">Record saved successfully!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error in query: ' . $con->error . '</div>';
    }
}
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
    <form id="form1" name="form1" method="post" action="">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>SI NO</th>
                    <th>Worker Name</th>
                    <th>Worker Details</th>
                    <th>Contact</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $selqry = "SELECT * FROM tbl_work";
                $cate = $con->query($selqry);
                while ($data = $cate->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($i); ?></td>
                    <td><?php echo htmlspecialchars($data['work_name']); ?></td>
                    <td><?php echo htmlspecialchars($data['subcat_id']); ?></td>
                    <td><?php echo htmlspecialchars($data['worker_id']); ?></td>
                    <td><?php echo htmlspecialchars($data['price']); ?></td>
                    <td>
                        <a href="ViewWorks.php?reqid=<?php echo htmlspecialchars($data['work_id']); ?>" class="btn btn-primary btn-sm">Request</a>
                        <a href="ViewWorker.php?id=<?php echo htmlspecialchars($data['worker_id']); ?>" class="btn btn-info btn-sm">View Worker</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </form>
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
