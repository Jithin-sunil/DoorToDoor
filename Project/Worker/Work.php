<?php
include('../Assests/Connection/Connection.php');
include('Header.php');

if (isset($_POST["btnadd"])) {
    $work = $_POST['txtname'];
    $subcategory = $_POST['selsubcategory'];
    $price = $_POST['txtprice'];
    $insqry = "INSERT INTO tbl_work (work_name, subcat_id, price, worker_id) VALUES ('$work', '$subcategory', '$price', '" . $_SESSION['wid'] . "')";
    if ($con->query($insqry)) {
        echo '<div class="alert alert-success" role="alert">Record saved successfully!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error in query: ' . $con->error . '</div>';
    }
}

if (isset($_GET['delid'])) {
    $delquery = "DELETE FROM tbl_work WHERE work_id='" . $_GET['delid'] . "'";
    if ($con->query($delquery)) {
        echo '<div class="alert alert-success" role="alert">Record deleted successfully!</div>';
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
    <title>Work Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Manage Work</h1>
    
    <!-- Add Work Form -->
    <form id="form1" name="form1" method="post" action="">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtname">Work Name</label>
                    <input type="text" name="txtname" class="form-control" id="txtname" required>
                </div>
                <div class="form-group">
                    <label for="selcategory">Category</label>
                    <select name="selcategory" id="selcategory" class="form-control" onchange="getsubcat(this.value)" required>
                        <option value="">----- Select -----</option>
                        <?php
                        $selqry = "SELECT * FROM tbl_category";
                        $cate = $con->query($selqry);
                        while ($data = $cate->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $data['category_id'] ?>"><?php echo $data['category_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selsubcategory">Subcategory</label>
                    <select name="selsubcategory" id="selsubcategory" class="form-control" required>
                        <option value="">----- Select -----</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="txtprice">Price</label>
                    <input type="text" name="txtprice" class="form-control" id="txtprice" required>
                </div>
                <button type="submit" name="btnadd" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>
    
    <br>
    
    <!-- Work List Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Work Name</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $selqry = "SELECT * FROM tbl_work w INNER JOIN tbl_subcat s ON w.subcat_id = s.subcat_id INNER JOIN tbl_category c ON s.category_id = c.category_id WHERE worker_id='" . $_SESSION['wid'] . "'";
            $work = $con->query($selqry);
            while ($data = $work->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['work_name'] ?></td>
                    <td><?php echo $data['category_name'] ?></td>
                    <td><?php echo $data['subcat_name'] ?></td>
                    <td><?php echo $data['price'] ?></td>
                    <td><a href="Work.php?delid=<?php echo $data['work_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a></td>
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
<script src="../Assests/JQ/JQuery.js"></script>
<script>
 
    function getsubcat(catId) {
        $.ajax({
            url: "../Assests/AjaxPages/AjaxCategory.php?catId=" + catId,
            success: function(result) {
                $("#selsubcategory").html(result);
            }
        });
    }
</script>
</body>
</html>

<?php
include('Footer.php');
?>
