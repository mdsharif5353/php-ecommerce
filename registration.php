<?php
include 'includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Add additional checks for input validation and password hashing for security

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php require 'includes/header.php'; ?>
<!-- <h2 class="text-center">User Registration</h2> -->
<div class="d-flex align-items-center justify-content-center " style="height: 100vh;">
    <form action="registration.php" method="post" class="border border-dark-subtle p-5 shadow">
        <h3 class="text-center"> User resgistration</h3>
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>

        <p class="mt-3"><a href="login.php">Login?</a></p>
    </form>
</div>


</body>

</html>

<!-- <form action="registration.php" method="post">
        Name: <input type="text" name="name"><br>
        Email: <input type="text" name="email"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Register">
    </form> -->