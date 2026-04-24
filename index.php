<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

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
        <h2 class="text-center mb-4">Welcome, <?= $_SESSION['user']['name']; ?></h2>
        <div class="row justify-content-between">
            <div class="col-md-4">
                <a href="logout.php" class="btn btn-danger mb-3">Logout</a>
                <?php if ($_SESSION['user']['role'] == 'admin') { ?>
                    <a href="create.php" class="btn btn-success mb-3">Add New User</a>
                <?php } ?>
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

                <?php if (isset($_GET['msg1'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Alert!</strong> <?= $_GET['msg1'] ?? '' ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <?php if (isset($_GET['msg'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success</strong> <?= $_GET['msg'] ?? '' ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <table class="table table-bordered mt-4">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <?php if ($_SESSION['user']['role'] == 'admin') { ?>
                                <th>Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($result) > 0) {

                        ?>
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
                                    <?php if ($_SESSION['user']['role'] == 'admin') { ?>
                                        <td>
                                            <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php }
                        } else {
                            ?>

                            <tr class="text-center">
                                <th colspan="7">Record Not Found !!</th>
                            </tr>

                        <?php

                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>


</body>

</html>