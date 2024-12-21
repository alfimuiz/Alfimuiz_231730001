<?php
session_start();
include '../includes/db.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi username dan password (ini hanya contoh, sebaiknya gunakan hash untuk password)
    if ($username == 'admin' && $password == 'password') { // Ganti dengan logika autentikasi yang lebih aman
        $_SESSION['admin_logged_in'] = true;
        header('Location: index.php'); // Redirect ke dashboard admin
        exit;
    } else {
        $error_message = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Login</title>
</head>
<body>
<div class="container mt-5">
    <h1>Admin Login</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </form>

    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger mt-3"><?php echo $error_message; ?></div>
    <?php endif; ?>
</div>
</body>
</html>