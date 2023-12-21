<?php require 'includes/header.php'; ?>
<?php require 'includes/navbar.php'; ?>
<?php require 'includes/slider.php'; ?>

<?php
include 'includes/db_config.php';

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>

<div class=" container mt-4 ">
    <h3 class="mb-4">Shop By Category</h3>
    <?php
    if ($result->num_rows > 0) {
        echo '<div class="container text-center">';
        echo '<div class="mt-2 row row-cols-2 row-cols-sm-3 row-cols-md-5">';

        while ($row = $result->fetch_assoc()) {
            echo '<div class="col border border-secondary-subtle d-flex flex-column shadow-sm">';
            echo '<div class="d-flex justify-content-between p-2">';
            echo '<p>' . $row["name"] . '</p>';
            echo '<img src="assets/images/' . basename($row["image"]) . '" width="50" height="50">';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
    } else {
        echo '<p>No categories found</p>';
    }
    ?>

</div>

<?php require 'includes/footer.php'; ?>