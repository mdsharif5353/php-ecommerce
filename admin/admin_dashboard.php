<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome Admin!</h2>
    <!-- Admin Dashboard Content -->
    <a href="../logout.php">Logout</a>
</body>
</html>
