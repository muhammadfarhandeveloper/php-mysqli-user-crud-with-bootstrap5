<?php
include 'db.php';

// Search Query
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM users";
}

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>



    <div class="container mt-5">
        <h2 class="text-center mt-5 mb-4">Users CRUD with PHP & MYSQL</h2>
        <div class="row justify-content-between">
            <div class="col-md-4">
                <a href="create.php" class="btn btn-success mb-3">Add New User</a>
            </div>
            <div class="col-md-4">
                <form method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by Name, Email " value="<?= htmlspecialchars($search); ?>">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="index.php" class="btn btn-secondary">Reset</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">


                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>

                                <!-- <?= "..." ?>  -->
                                <!-- This is a shorthand for  -->
                                <!-- <?php echo "..."; ?>,  -->

                                <td><?= $row['id']; ?></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['role']; ?></td>
                                <td><?= $row['status'] ? 'Active' : 'Inactive'; ?></td>
                                <td><?= $row['created_at']; ?></td>
                                <td>
                                    <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>



</body>

</html>