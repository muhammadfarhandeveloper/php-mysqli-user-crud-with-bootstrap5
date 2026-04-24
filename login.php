<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Login</h2>

    <form action="login_process.php" method="POST" class="w-50 mx-auto mt-4">
        
        <input type="email" name="email" class="form-control mb-3" placeholder="Enter Email" required>
        
        <input type="password" name="password" class="form-control mb-3" placeholder="Enter Password" required>
        
        <button class="btn btn-primary w-100">Login</button>

    </form>
</div>

</body>
</html>