<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h2>Welcome User!</h2>
    <!-- User Dashboard Content -->
    <a href="../logout.php">Logout</a>
</body>
</html>
