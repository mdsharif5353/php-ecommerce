<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../includes/db_config.php';

    $name = $_POST['name'];

    // File upload handling
    $image = '';

    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
    $filename = $_FILES['image']['name'];
    $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Check if the uploaded file type is allowed
        if (!in_array(strtolower($file_ext), $allowed_types)) {
            echo "Invalid file type! Only JPG, JPEG, PNG, and GIF files are allowed.";
            exit();
        }

        $file_tmp = $_FILES['image']['tmp_name'];
        $file_destination = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/' . $filename;

        if (move_uploaded_file($file_tmp, $file_destination)) {
            $image = $file_destination;

            $sql = "INSERT INTO categories (name, image) VALUES ('$name', '$image')";
            if ($conn->query($sql) === TRUE) {
                header("Location: admin_dashboard.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "File upload failed!";
            exit();
        }
    } else {
        echo "Image upload error!";
        exit();
    }
    $conn->close();
}
