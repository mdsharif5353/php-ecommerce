<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: user/user_dashboard.php");
    exit();
} elseif (isset($_SESSION['admin'])) {
    header("Location: admin/admin_dashboard.php");
    exit();
}
?>

<?php require 'includes/header.php'; ?>

<div class="d-flex align-items-center justify-content-center" style="height: 100vh;">

    <?php
    if (isset($_GET['error'])) {
        echo '<p style="color:red;">Invalid email or password!</p>';
    }
    ?>
    <form action="login_handler.php" method="post" class="border border-dark-subtle p-5 shadow">
    <h2 class="text-center">User Login</h2>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        
        <p class="mt-3"><a href="registration.php">Register?</a></p>
    </form>
</div>

</body>

</html>


<!-- <h1> <a href="index.php"> Home</a></h1>
    <h2>Login</h2>
    <?php
    if (isset($_GET['error'])) {
        echo '<p style="color:red;">Invalid email or password!</p>';
    }
    ?>
    <form action="login_handler.php" method="post">
        Email: <input type="text" name="email"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
    <a href="registration.php">Register</a>  -->