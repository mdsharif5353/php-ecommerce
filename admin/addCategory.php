<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database configuration file
    include '../includes/db_config.php';

    // Get form data
    $name = $_POST['name'];

    // File upload handling
    $image = ''; // Initialize image variable

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
            $image = $file_destination; // Save image path to database

            // Insert into the database
            $sql = "INSERT INTO categories (name, image) VALUES ('$name', '$image')";
            if ($conn->query($sql) === TRUE) {
                // Redirect to the page after successful insertion
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

    // Close the database connection
    $conn->close();
}
?>

