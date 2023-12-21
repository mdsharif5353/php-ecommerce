<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome Admin!</h2>
    <a href="../logout.php">Logout</a>
</body>
</html> -->
<?php require 'admin_header.php'; ?>
<?php require 'admin_layout.php'; ?>
<?php require 'admin_footer.php'; ?>