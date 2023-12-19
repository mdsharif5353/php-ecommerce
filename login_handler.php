<?php
session_start();
include 'includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $email;
        header("Location: user/user_dashboard.php");
        exit();
    }

    if ($email === 'admin@gmail.com' && $password === '12345678') {
        $_SESSION['admin'] = $email;
        header("Location: admin/admin_dashboard.php");
        exit();
    }

    header("Location: login.php?error=1");
    exit();
}
?>
